@extends('layout.app')

@section('title','Informasi Produk')

@section('side-cart')
    <div class="wrapper">
        <section id="cart">
        <span class="cart-title"><i class="fa fa-shopping-cart fa-fw"><span class="cart-counter">{{ Cart::count() }}</span></i>Keranjang</span>
        @foreach (Cart::content() as $item)
        <article class="cart-total">
        <div class="d-flex justify-content-end sidecart">
        <div class="prdct-img"><img src="{{ asset('storage/'.$item->model->foto1) }}"  style="width:96px;position: relative;margin-right: 13px;"></div>
        <div class="d-flex flex-column">
        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="delete"><button type="submit" class="btn btn-outline-danger trash"><img src="/bibit/assets/trash.png"></button></div>
        </form>
  <div class="prdct-description"><p class="p-sidecart">{{ $item->model->nama }}</p>
  <span class="product-price"></i><b><?php 
              if($item->model->harga_diskon == 0){
                echo $item->model->harga;
                }else{echo $item->model->harga_diskon;}?></b></span><br>
  </div>
  <div class=" prdct-description"> <p class="p-sidecart">Isi: {{ $item->model->isi }}</p></div>
  <div class=" prdct-description"> <p class="p-sidecart">Berat : {{ $item->model->berat }}</p></div>
  </article>
  @endforeach
  <div class=" prdct-price"> <p class="p-sidecart rp">Total Harga: {{ Cart::total() }}</p></div>
  <a href="{{ route('cart.index') }}"><button type="button" class="btn btn-outline-info button order mt-3" style="width: 210px;">Lihat Semua</button></a>  
      <div class="close"><i class="fa fa-times fa-fw"></i></div>
     
    </div>
</div>
</section>
   
@endsection


@section('content')
<style type="text/css">
  #carouselExampleFade.carousel.slide.carousel-fade {
  width: auto;
  height: auto;
}

.carousel-inner {
  width: 230px;
  height: auto;
}
</style>
<div class="container-fluid info" style="margin-top:80px;">
    <div class="d-flex justify-content-start mb-3">
        <div class="produk-img p-2">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div id="produk-mobile" class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('storage/'.$product->foto1) }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('storage/'.$product->foto2) }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('storage/'.$product->foto3) }}" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        <div class="container-fluid">
          <div class="title">{{ $product->nama }}</div>
          <div id="rp-diskon" class="rp">Rp.<?php 
            if($product->harga_diskon == 0){
              echo $product->harga;
              }else{echo $product->harga_diskon;}?></div>
          <div class="rating">{!! $product->rating !!}</div>
          <div class="gaya">Isi: {{ $product->isi }}</div>
          <div class="gaya">Keterangan: {{ $product->keterangan }}</div>
          <div class="stock">Stok: {{ $product->stok }}</div>
          <form action="{{ route('cart.store') }}" method="POST">
              {{ csrf_field() }}
          <div class="xQty">
              <input type='button' value='-' class='qtyminus' field='quantity' />
              <input type='text' id="quantity" name='qty' value='1' class='qtyValue' min="1" />
              <input type='button' value='+' class='qtyplus' field='quantity' />
          </div><br>
          <div class="buy">
              <input type="hidden" name="id" value="{{ $product->id}}">
              <input type="hidden" name="name" value="{{ $product->nama }}">
              <input type="hidden" name="price" value="<?php 
              if($product->harga_diskon == 0){
                echo $product->harga;
                }else{echo $product->harga_diskon;}?>">
              <input type="hidden" name="isi" value="{{ $product->isi }}">
              <input type="hidden" name="berat" value="{{ $product->berat }}">
              <input type="hidden" name="foto" value="{{ $product->foto1 }}">
              <button type="submit" class="btn btn-outline-info">Beli Sekarang</button>
          {{-- <button data-toggle="modal" data-target="#myModal" data-product-id="{{ $sayur->id }}" type="button" class="btn btn-outline-info" style="margin-left: 30px;">Beli Sekarang</button>
          <button type="button" class="btn btn-info" style="margin-left: 30px;">Masukkan keranjang</button> --}}
          </div>
          </form>
        </div>
    </div>


    <div class="d-flex justify-content-start mb-3">
        <div class="">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#menu1" role="tab" aria-controls="profile" aria-selected="false">Tips</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#menu2" role="tab" aria-controls="contact" aria-selected="false">Ulasan</a>
                </li>
              </ul> 
          <div class="tab-content">
            <div id="home" class="container tab-pane active">
              <h5 class="slash-pane">Deskripsi</h5>
              <p>{!! $product->deskripsi !!}</p>
            </div>
            <div id="menu1" class="container tab-pane fade">
              <h5 class="slash-pane">Tips Menanam</h5>
              <p>{!! $product->tips !!}</p>
            </div>
            <div id="menu2" class="container tab-pane fade">
              <h5 class="slash-pane">Ulasan</h5>
              <p>{{ $product->ulasan }}</p>
            </div>
          </div>
        </div>
      </div>  
</div>  
@endsection

@section('kategori-pilihan')
  <div class="container-fluid info">
  <div class="jdl mt-2">KATEGORI PILIHAN</div>
  <div class="row mt-2">
    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
      <div class="MultiCarousel-inner">
         @foreach ($categories as $category)
              
          <div class="item">
            <div class="pad15-produk">
              <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                <div class="card border-{{$category->warna_border}} mx-sm-1 p-1">
                  <div class="card border-{{$category->warna_border}}  shadow text-{{$category->warna_border}} p-2 my-card" ><span class="{{$category->logo2}}" aria-hidden="true"></span></div>
                  <div class="text-{{$category->warna_border}} text-center"><h5 style="color: {{$category->border}}; margin-top: 5px;">{{ $category->nama }}</h5></div>
                </div>
              </a>
            </div>
          </div>

          @endforeach
        
      </div>
      <button class="btn btn-success leftLst"><img src="https://img.icons8.com/ios-filled/15/000000/long-arrow-left.png"></button>
      <button class="btn btn-success rightLst"><img src="https://img.icons8.com/ios-filled/15/000000/long-arrow-right.png"></button>
    </div>
  </div> 
</div>
@endsection

@section('rekomendasi')

<div class="container-fluid info">
<div class="jdl mt-2">REKOMENDASI</div>

<div class="d-flex justify-content-start mb-3 flex-wrap">
    <div class="">
      <section id="catalog">
    @foreach ($rekomendasi as $rekomen)
    <article class="product"  data-product-id="{{ $rekomen->id }}">
      <div class="product-wrapper">
        <a href="{{ route('produk.show', $rekomen->slug) }}">
        <div class="product-img">
          <img src="{{ asset('storage/'.$rekomen->foto1) }}"/>
        </div>
        </a>
        <div class="product-info">
          <span class="product-brand">{{ $rekomen->nama }}</span>
          <span class="product-volume">{{ $rekomen->isi }}</span>
          <p>{!! $rekomen->rating !!}</p>
          <div class="d-flex justify-content-start mb-3"> 
          <div class="rp">Rp.</div><span class="product-price"><?php 
            if($rekomen->harga_diskon == 0){
              echo $rekomen->harga;
              }else{echo $rekomen->harga_diskon;}?></span>
          <div class="product-footer">  
          <button class="add-cart btn btn-outline-success">Masukkan keranjang</button>
          </div>
        </div>
      </div>
      </div>
    </article>
    @endforeach
  
    </div>
  </div>
</div>
@endsection