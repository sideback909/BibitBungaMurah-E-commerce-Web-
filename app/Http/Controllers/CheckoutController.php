<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Upload;
use App\Category;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use App\Mail\OrderPlacedConsum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Exception\CardErrorException;
use GuzzleHttp\Client;
use App\City;
use App\Province;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Province::get();
        $city = City::get();

        if(request()->category){
            $produk = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
            $categories = Category::all();
        } else{
            $categories = Category::all();
        }


        return view('product.checkout', compact('categories', 'city', 'provinsi'));
    }


    /**
     * To get Api Province
     */
    public function getprovince()
    {
        $client= new Client();

        try{
            $response = $client->get('https://api.rajaongkir.com/starter/province', 
                array(
                    'headers' => array(
                        'key' => '89e1c86852af34dca169b0d3a69bd77f',
                    )
                )
            );
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();
        $array_result = json_decode($json, true);

        for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++){
            $province = new Province();
            $province->id = $array_result["rajaongkir"]["results"][$i]["province_id"];
            $province->name = $array_result["rajaongkir"]["results"][$i]["province"];
            $province->save();
        }
    }

    /**
     * To get Api City
     */
    public function getcity()
    {
        $client= new Client();

        try{
            $response = $client->get('https://api.rajaongkir.com/starter/city', 
                array(
                    'headers' => array(
                        'key' => '89e1c86852af34dca169b0d3a69bd77f',
                    )
                )
            );
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();
        $array_result = json_decode($json, true);

        for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++){
            $city = new City();
            $city->id = $array_result["rajaongkir"]["results"][$i]["city_id"];
            $city->name = $array_result["rajaongkir"]["results"][$i]["city_name"];
            $city->id_province = $array_result["rajaongkir"]["results"][$i]["province_id"];
            $city->save();
        }
        // print_r($array_result);
    }

    public function ongkir(Request $request)
    {
        $client= new Client();
        $provinsi = Province::get();
        $city = City::get();
        $alamat = $request->alamat;
        $kecamatan = $request->kecamatan;
        $kabupaten = $request->kabupaten;
        $kodepos = $request->kodepos;
        $nohp = $request->nohp;

        if(request()->category){
            $produk = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
            $categories = Category::all();
        } else{
            $categories = Category::all();
        }

        
        try{
            $response = $client->request('POST', 'https://api.rajaongkir.com/starter/cost',
                [
                    'body' => 'origin=419&destination='.$request->kabupaten.'&weight='.$request->berat.'&courier='.$request->jasa.'',
                    'headers' => [
                        'key' => '89e1c86852af34dca169b0d3a69bd77f',
                        'content-type' => 'application/x-www-form-urlencoded',
                    ]
                ]
            );
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $jasa = $request->jasa;
        $json = $response->getBody()->getContents();
        $array_result = json_decode($json, true);

        $origin = $array_result["rajaongkir"]["origin_details"]["city_name"];
        $destination = $array_result["rajaongkir"]["destination_details"]["city_name"];

        return view('product.checkoutresult', compact('alamat', 'kodepos', 'kecamatan', 'kabupaten', 'nohp', 'jasa', 'origin', 'destination', 'array_result',  'city', 'provinsi', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        global $order;

        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'email' => $request->email,
            'nama' => $request->name,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'kodepos' => $request->kodepos,
            'nohp' => $request->nohp,
            'subtotal' => Cart::subtotal(),
            'total_harga' => Cart::total()+$request->ongkir,
            'jasa' => $request->jasa,
            'ongkir' => $request->ongkir,
            // 'subtotal' => $this->getNumbers()->get('newSubtotal'),
            // 'total_harga' => $this->getNumbers()->get('newTotal'),
            'error' => null,
        ]);

        //memasukkan ke dalam table order_product
        foreach (Cart::content() as $item) {
            $items = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }
        Mail::send(new OrderPlaced($order, $items));
        Mail::send(new OrderPlacedConsum($order, $items));

        return redirect()->route('order.index', ( auth()->user()->name ));
        // $this->store_bukti($order);
    }

    public function store_bukti(Request $request, Order $order)
    {
        $this->validate($request, [
        'select_file'  => 'required|image|max:2048'
        ]);
   
        $image = $request->file('select_file');
   
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
   
        $image->move(storage_path('app/public'), $new_name);

        Upload::create([
            'order_id' => $request->id_order,
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'nama' => auth()->user() ? auth()->user()->name : null,
            'total_harga' => $request->total,
            'gambar_bukti' => $new_name
        ]);


        return back()->with('success', 'Bukti Pembayaran Berhasi Di Upload!');
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getNumbers()
    {
        $newSubtotal = Cart::subtotal();
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal;
        $newTotal = $newSubtotal;

        return collect([
            'newSubtotal' => $newSubtotal,
            'newTotal' => $newTotal,
        ]);
    }

}
