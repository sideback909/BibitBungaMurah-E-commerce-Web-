@extends('layout/app')

@section('title','Bibit Bunga Murah')

@section('side-cart')
    <div class="wrapper">
        <section id="cart">
        <span class="cart-title"><i class="fa fa-shopping-cart fa-fw"><span class="cart-counter">{{ Cart::count() }}</span></i>Keranjang</span>
        @foreach (Cart::content() as $item)
        <article class="cart-total">
        <div class="side-product">
            <div class="cart-product-img"><img src="{{ asset('storage/'.$item->model->foto1) }}"></div>    
            <div class="product-description">
            <span class="p-sidecart">{{ $item->model->nama }}</span>
          
      </div>
      <div class="product-description"> <p class="p-sidecart">Isi: {{ $item->model->isi }} / pcs</p></div>
      <div class="product-description"> <p class="p-sidecart">Berat : {{ $item->model->berat }} kg</p></div>
    </div>
    <div class="cart-product-footer">
    <span class="product-price"><b> Harga : <?php 
                  if($item->model->harga_diskon == 0){
                    echo $item->model->harga;
                    }else{echo $item->model->harga_diskon;}?></b></span>
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST" style="float:right">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
                    <button type="submit" class="cart-product-delete"><img class="img-right" src="https://img.icons8.com/windows/25/000000/trash.png"></button>
                    </form>
</div>

    </article>
      
  @endforeach
  <div class=" prdct-price"> <p class="p-sidecart rp">Total Harga: {{ Cart::total() }}</p></div>
  <a href="{{ route('cart.index') }}"><button type="button" class="btn btn-outline-info button order mt-3" style="width: 210px;">Lihat Semua</button></a>  
      <div class="close"><button id="btnclose" onclick="close()"><i class="fa fa-times fa-fw"></i></button></div>
     

</section>
   
@endsection


@section('carousel')
           <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach ($banner as $item)
    <div class="carousel-item active">
      <img src="{{ asset('storage/'.$item->gambar1) }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/'.$item->gambar2) }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/'.$item->gambar3) }}" class="d-block w-100" alt="...">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection

@section('category-option')
    <div class="jdl ml-3">KATEGORI PILIHAN</div>
    <div class="row mt-2">
   
      <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
      
        <div class="MultiCarousel-inner">
       
          @foreach ($categories as $category)
          
          <div class="item">
            <div class="pad15">
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
        <button class="btn btn-success leftLst leftList "><img src="https://img.icons8.com/ios-filled/15/000000/long-arrow-left.png"></button>
        <button class="btn btn-success rightLst"><img src="https://img.icons8.com/ios-filled/15/000000/long-arrow-right.png"></button>
      </div>
              
    </div> 
@endsection

@section('content')
   <div class="container-fluid" style="padding: 0;">
    <div class="flashsale row" style="background-color:#31c4b5;">
      
  <div class="jdl-diskon" >DISKON CEPAT</div>
<section class="mod-countdown js-countdown mt-3">
  <div class="judul">Berakhir dalam : </div>
  <div class="days primary">
    <span class="count"></span> 
    <span class="label"> : </span>  
  </div>
  <div class="hours secondary">
    <span class="count"></span>
    <span class="label"> : </span>
  </div>
  <div class="minutes secondary">
    <span class="count"></span>
    <span class="label"> : </span>
  </div>
  <div class="seconds secondary">
    <span class="count"></span>
    <span class="label"><img src="https://img.icons8.com/metro/15/000000/lightning-bolt.png"></span>
  </div>
</section>
        <div class="MultiCarousel diskoncepat" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
                <div class="d-flex justify-content-start mb-3">

  @foreach ($diskon as $dis)

    <div class="item" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}' id="auto">
      <div class="pad15 hvr" style="background-color: #ffff;">                 
        <a href="{{ route('produk.show', $dis->slug) }}">
        <figure class="produk">
        <div class="cover">
          <img src="{{ asset('storage/'.$dis->foto1) }}"/>
        
        <h2 style="margin:auto;">{{ $dis->nama }}</h2>
        <div class="price" id="home">
          <p>Rp.<strike>{{ $dis->harga }}</strike></p>
          <h6>Rp.{{ $dis->harga_diskon }}</h6>
          <h2 id="bintang">{!! $dis->rating !!}</h2>
        </div>
        </div>
        </figure>
        </a>  
      </div>
    </div>
  @endforeach
 {{-- <img src="{{ asset('storage/'.$dis->image) }}"/> --}}
            </div>
           
        </div>
         <button class="btn btn-success leftLst" ><img src="https://img.icons8.com/ios-filled/15/000000/long-arrow-left.png"></button>
            <button class="btn btn-success rightLst"><img src="https://img.icons8.com/ios-filled/15/000000/long-arrow-right.png"></button>
    </div>

        </div>

          
  <div class="container-fluid mt-2" style="padding-left: 2px;padding-right: 2px;margin-left: 7px;margin-right: auto;">
    <div class="d-flex justify-content-start flex-wrap">
    <section id="catalog">
    @foreach ($produk as $bibit)
    <a href="{{ route('produk.show', $bibit->slug) }}">
    <article class="product" data-product-id="{{$bibit ->id_product}}">
      <div class="product-wrapper">
        <div class="product-img">
          <img src="{{ asset('storage/'.$bibit->foto1) }}"/>
        </div>
      </a>
        <div class="product-info">
          <span class="product-brand">{{ $bibit->nama }}</span>
          <span class="product-volume">Isi Produk :  {{ $bibit->isi }}</span>
          <p>{!! $bibit->rating !!}</p>
          <div class="d-flex justify-content-start"> 
          <div id="rp-mobile" class="rp">Rp.<span class="product-price"><?php 
            if($bibit->harga_diskon == 0){
              echo $bibit->harga;
              }else{echo $bibit->harga_diskon;}?>
          </span></div>
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
  </section>
   </div>
   </div>
          
        
            
   <div class="d-flex justify-content-center p-2">	
    <div class="blank"></div>
    <div class="blank"></div>
    </div>

   

          <div class="line"></div>
          <div class="d-flex justify-content-between p-2">
            <div class="mitra"><h6 id="tombol-ikut" >Mau ikut jualan bunga? bermitra dengan bibit bunga murah sekarang! Mudah,nyaman,dan transaksi mudah GRATIS!</h6></div>
            <div class="null"></div>
            <div class="daftar"><button type="button" class="btn btn-outline-success">Ikut Berjualan GRATIS</button></div>
          </div>
          <div class="d-flex justify-content-start p-2 lgvw">
              <div class="sosmed mt-5"><text>Temukan kami di :</text><br>
                <div class="socmed">
                <a  href="#"><img src="/bibit/assets/tokped.png" class="image-fluid" style="width: 40px; height: 40px;"></a>
                <a href="#"><img src="/bibit/assets/bukalapak3.png" class="image-fluid" style="width: 38px; height: 38px; margin-top: 4px;"></a>
                <a href="#"><img src="/bibit/assets/instagram.png" class="image-fluid" style="width: 38px; height: 38px;margin-top: 4px;"></a>
                <a href="#"><img src="/bibit/assets/wa.png" class="image-fluid" style="width: 59px; height: 59px;"></a>
                  </div>
              </div>

          </div>
          <div class="line"></div>
          <div id="summary">
            <p class="collapse p-1" id="collapseSummary">
              Bibit Bunga Murah merupakan situs jual beli online di Indonesia yang memiliki banyak produk tanaman dan menjual berbagai macam produk untuk memenuhi kebutuhan tanaman Anda. Belanja online terasa semakin mudah dan menyenangkan saat ini karena apapun yang Anda inginkan pasti bisa ditemukan di Bibit Bunga Murah. Cari tanaman kesukaanmu, belanja untuk menghias taman anda, beli berbagai kebutuhan bercocok tanam, semua bisa kamu lakukan hanya dengan sekali klik.
            </p>
            <a class="collapsed" data-toggle="collapse" href="#collapseSummary" aria-expanded="false" aria-controls="collapseSummary"></a> </div>
            <div class="line"></div>
            <div class="d-flex justify-content-start mb-3">
              <div class="p-2"> <img src="/bibit/assets/logoj.png" alt="logo" style="width:58px;"></div>
              <div class="p-2"><small>@Bibit Bunga Murah 2019-2019</small><br><small>Server process time: 0.106 secs.</small></div>
            </div>  

            <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        setting-name: setting-value
      });
    });
    
  </script>
@endsection