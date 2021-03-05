@extends('layout.app')

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
<div class="container-fluid mt-2" style="padding-left: 2px;padding-right: 2px;margin-left: 7px;margin-right: auto;">
        <div class="d-flex justify-content-start flex-wrap" style="margin-top:50px;">
        <section id="catalog" class="text-center">
        @foreach ($posts as $pro)
        <a href="{{ route('produk.show', ['category' => $pro->slug]) }}">
        <article class="product" data-product-id="{{$pro -> id}}">
          <div class="product-wrapper">
            <div class="product-img">
              <img src="{{ asset('storage/'.$pro->foto1) }}"/>
            </div>
          </a>
            <div class="product-info">
              <span class="product-brand">{{ $pro->nama }}</span>
              <span class="product-volume">{{ $pro->isi }}</span>
              <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
              class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
              class="fas fa-star text-warning"></i>
              <div class="d-flex justify-content-start mb-3"> 
              <div class="rp">Rp.</div><span class="product-price"><?php 
                if($pro->harga_diskon == 0){
                  echo $pro->harga;
                  }else{echo $pro->harga_diskon;}?></span>
              <div class="product-footer">
                  
                <form action="{{ route('cart.store_home') }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $bibit->id}}">
                  <input type="hidden" name="name" value="{{ $bibit->nama }}">
                  <input type="hidden" name="qty" value="1">
                  <input type="hidden" name="price" value="<?php 
                  if($bibit->harga_diskon == 0){
                    echo $bibit->harga;
                    }else{echo $bibit->harga_diskon;}?>">
                  <input type="hidden" name="isi" value="{{ $bibit->isi }}">
                  <input type="hidden" name="berat" value="{{ $bibit->berat }}">
                  <input type="hidden" name="foto" value="{{ $bibit->foto1 }}">
                  <button id="btn-produk" class="add-cart btn btn-outline-success">Masukkan keranjang</button>
                </form>
              </div>
            </div>
          </div>
          </div>
        </article>
        @endforeach
        {{-- {{ $posts->links() }} --}}
      </section>
    </div>
@endsection