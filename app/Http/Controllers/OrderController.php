<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use App\OrderProduct;
use App\Category;
use App\CategoryProduct;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Events\BreadDataRestored;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->category){
            $produk = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
            $categories = Category::all();
        } else{
            $categories = Category::all();
        }

        $order = Order::where('user_id', auth()->user()->id)->get();

        // $leagues = DB::table('products')
        //     ->join('order_product', 'order_product.product_id', '=', 'products.id')
        //     ->join('orders', 'orders.id', '=', 'order_product.order_id')
        //     ->where('orders.user_id', auth()->user()->id)
        //     ->get();
        foreach($order as $or){
            $leagues = $or->products;

            if($leagues == null){
                return view('product.order');
            }else{
            // $orderst = Product::with('id')->whereHas('id', function ($query){ $query->where(''$order);})->get();
            // $orderzz = Order::where('id', $orderst)->get();
            // $orders = Order::find($orderzz);
            // $orderss = OrderProduct::where('product_id', $orders)->get();    
    
    
            // return view('product.order', compact('categories', 'order', 'orderss'));
            return view('product.order', compact('categories', 'order', 'leagues'));
            }
        }

        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        
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
