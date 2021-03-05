<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Diskon;
use App\Category;
use App\Banner;


class PostsController extends Controller
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
            $produk = Product::inRandomOrder()->take(18)->paginate(15); 
            $categories = Category::all();
        }

        $diskon = Product::with('categories')->whereHas('categories', function ($query){ $query->where('slug','diskon');})->take(5)->get();
        $banner = Banner::all(); 

        // $diskon = Product::inRandomOrder()->take(5)->get();

        return view('page.index',compact('produk', 'diskon', 'categories', 'banner'));

        // $diskon = Diskon::inRandomOrder()->take(5)->get();
        // $produk = Product::inRandomOrder()->take(20)->get(); 
        // $categories = Category::all();

        // return view('page.index',compact('produk', 'diskon', 'categories'));
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
    // public function show(Product $product)
    // {
    //     return view('product.index', compact('product'));
    // }

    public function show($slug)
    {
        // $product = Product::where('slug', $slug)->firstOrFail();
        // $rekomendasi = Product::where('slug', '!=', $slug)->rekomendasi()->get();

        // return view('product.index')->with([
        //     'product' => $product,
        //     'rekomendasi' => $rekomendasi,
        //     ]);

        if(request()->category){
            $produk = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
            $categories = Category::all();
        } else{
            $produk = Product::inRandomOrder()->take(20)->get(); 
            $categories = Category::all();
        }
        $product = Product::where('slug', $slug)->firstOrFail();
        $rekomendasi = Product::where('slug', '!=', $slug)->rekomendasi()->get();

        return view('product.index')->with([
            'product' => $product,
            'rekomendasi' => $rekomendasi,
            'categories' => $categories,
            ]);
    }


    public function show_diskon($slug)
    {
        if(request()->category){
            $produk = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
            $categories = Category::all();
        } else{
            // $produk = Product::inRandomOrder()->take(20)->get(); 
            $categories = Category::all();
        }

        $diskon = Diskon::where('slug', $slug)->firstOrFail();
        $rekomendasi = Product::where('slug', '!=', $slug)->rekomendasi()->get();

        return view('product.diskon')->with([
            'diskon' => $diskon,
            'rekomendasi' => $rekomendasi,
            'categories' => $categories,
            ]);
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

    public function search(Request $request)
    {
        if(request()->category){
            $produk = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
            $categories = Category::all();
        } else{
            $categories = Category::all();
        }
        
        $cari = Input::get('cari');

        $posts = Product::where('nama', 'LIKE', '%' .$cari. '%')->take(10)->get();
        // $posts = CabaiHias::where('nama', 'LIKE', '%' .$cari. '%')->get();
        // $posts = Tanamann::where('nama', 'LIKE', '%' .$cari. '%')->get();
        // $posts = Bunga::where('nama', 'LIKE', '%' .$cari. '%')->get();
        // $posts = BungaMatahari::where('nama', 'LIKE', '%' .$cari. '%')->get();

        return view('product.search', [
            'posts' => $posts,
            'categories' => $categories
            ]);
    }
    
}
