<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Upload;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Exception\CardErrorException;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $order = Order::where('user_id', auth()->user()->id)->take(1)->get();
        // $orders = OrderProduct::where('order_id', $order)->take(1)->get();
        $product = Order::where('id', $id)->firstOrFail();
        $total = Order::get();

        return view('product.upload', compact('product', 'total'));
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
    public function store(Request $request)
    {
    //     $this->validate($request, [
    //     'select_file'  => 'required|image|max:2048'
    //     ]);
   
    //     $image = $request->file('select_file');
   
    //     $new_name = rand() . '.' . $image->getClientOriginalExtension();
   
    //     $image->move(public_path('images'), $new_name);

    //     $order = Order::all();
    //     Upload::create([
    //         'order_id' => 
    //         'user_id' => auth()->user() ? auth()->user()->id : null,
    //         'nama' => auth()->user() ? auth()->user()->name : null,
    //         'total_harga' => Cart::total(),
    //         'gambar_bukti' => $new_name
    //     ]);


    //     return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
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
}
