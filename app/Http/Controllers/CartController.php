<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.cart');
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
        // Cart::add($request->id, $request->name, 1, $request->price, $request->berat,['isi' => $request -> isi], ['foto' => $request -> foto])
        //     ->associate('App\Product');
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item sudah ada di keranjangmu!');
        }

        Cart::add($request->id, $request->name, $request->qty, $request->price, $request->berat,['isi' => $request -> isi], ['foto' => $request -> foto])
            ->associate('App\Product');
        return redirect()->route('cart.index')->with('success_message', 'Produk ditambahkan ke cart');
    }

    public function store_home(Request $request)
    {
        // Cart::add($request->id, $request->name, 1, $request->price, $request->berat,['isi' => $request -> isi], ['foto' => $request -> foto])
        //     ->associate('App\Product');
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item sudah ada di keranjangmu!');
        }

        Cart::add($request->id, $request->name, $request->qty, $request->price, $request->berat,['isi' => $request -> isi], ['foto' => $request -> foto])
            ->associate('App\Product');
        return redirect('/');
    }

    // public function diskon_store(Request $request)
    // {
    //     // Cart::add($request->id, $request->name, 1, $request->price, $request->berat,['isi' => $request -> isi], ['foto' => $request -> foto])
    //     //     ->associate('App\Product');
    //     $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
    //         return $cartItem->id === $request->id;
    //     });

    //     if ($duplicates->isNotEmpty()) {
    //         return redirect()->route('cart.index')->with('success_message', 'Item sudah ada di keranjangmu!');
    //     }

    //     Cart::add($request->id, $request->name, $request->qty, $request->price, $request->berat,['isi' => $request -> isi], ['foto' => $request -> foto])
    //         ->associate('App\Diskon');
    //     return redirect()->route('cart.index')->with('success_message', 'Produk ditambahkan ke cart');
    // }

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
        Cart::update($id, $request->quantity);

        session()->flash('success_message','Jumlah berhasil diupdate!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message','Produk telah dihapus!');
    }

    function massremove(Request $request)
    {
        $cart_id_array = $request->input('id');
        $cart = Cart::whereIn('id', $cart_id_array);
        if($student->delete())
        {
            echo 'Item dihapus';
        }
    }
}
