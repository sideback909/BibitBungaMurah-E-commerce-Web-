@extends('layout.app')

@section('title','Informasi Produk')

@section('side-cart')
    <div class="wrapper">
        <section id="cart">
          <span class="cart-title"><i class="fa fa-shopping-cart fa-fw"><span class="cart-counter">0</span></i>Keranjang</span>
          <article class="cart-total">
            <span class="product-price"></i><b>0</b></span><br>
            <button type="button" class="btn btn-outline-info" style="width: 170px;">Lihat Semua</button>
          </article>
          <div class="close"><i class="fa fa-times fa-fw"></i></div>
        </section>
    </div>
@endsection


@section('content')
<style type="text/css">
  #carouselExampleFade.carousel.slide.carousel-fade {
  width: 230px;
  height: 300px;
}

.carousel-inner {
  width: 230px;
  height: 300px;
}
</style>
<div class="container-fluid info" style="margin-top:61px;">
    <div class="d-flex justify-content-start mb-3">
        <div class="produk-img p-2">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('storage/'.$diskon->foto1) }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('storage/'.$diskon->foto2) }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('storage/'.$diskon->foto3) }}" class="d-block w-100" alt="...">
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
          <div class="title">{{ $diskon->nama }}</div>
          <div class="harga-awal"><strike>Rp.{{ $diskon->harga_awal }}</strike></div>
          <div class="rp">Rp.{{ $diskon->harga_diskon }}</div>
          <div class="rating">{!! $diskon->rating !!}</div>
          <div class="gaya">Isi: {{ $diskon->isi }}</div>
          <div class="gaya">Keterangan: {{ $diskon->keterangan }}</div>
          <div class="stock">Stok: {{ $diskon->stok }}</div>
          <form action="{{ route('cart.diskon_store') }}" method="post">
              {{ csrf_field() }}
          <div class="xQty">
              <input type='button' value='-' class='qtyminus' field='quantity' />
              <input type='text' name='qty' value='1' class='qtyValue' min="1" />
              <input type='button' value='+' class='qtyplus' field='quantity' />
          </div><br>
          <div class="buy">
                <input type="hidden" name="id_diskon" value="{{ $diskon->id_diskon }}">
                <input type="hidden" name="name" value="{{ $diskon->nama }}">
                <input type="hidden" name="price" value="{{ $diskon->harga_diskon }}">
                <input type="hidden" name="isi" value="{{ $diskon->isi }}">
                <input type="hidden" name="berat" value="{{ $diskon->berat }}">
                <input type="hidden" name="foto" value="{{ $diskon->foto1 }}">
                <button type="submit" class="btn btn-outline-info">Beli Sekarang</button>
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
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#menu1" role="tab" aria-controls="profile" aria-selected="false">Tips Menanam</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#menu2" role="tab" aria-controls="contact" aria-selected="false">Ulasan</a>
                </li>
              </ul> 
          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
              <h3>Deskripsi</h3>
              <p>{{ $diskon->deskripsi }}</p>
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
              <h3>Tips Menanam</h3>
              <p>{{ $diskon->tips }}</p>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>
              <h3>Ulasan</h3>
              <p>{{ $diskon->ulasan }}</p>
            </div>
          </div>
        </div>
      </div>  
</div>   
@endsection

@section('kategori-pilihan')
  <div class="container-fluid info">
  <div class="jdl">KATEGORI PILIHAN</div>
  <div class="row mt-2">
    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
      <div class="MultiCarousel-inner">
          @foreach ($categories as $category)
              
          <div class="item">
            <div class="pad15">
              <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                <div class="card border-info mx-sm-1 p-1">
                  <div class="card border-info shadow text-info p-2 my-card" ><span class="fa fa-seedling" aria-hidden="true"></span></div>
                  <div class="text-info text-center"><h6 style="color: #5bc0de; margin-top: 5px;">{{ $category->nama }}</h6></div>
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
<div class="jdl">REKOMENDASI</div>

<div class="d-flex justify-content-start mb-3 flex-wrap">
    <div class="">
      <section id="catalog">
        @foreach ($rekomendasi as $rekomen)
        <article class="product" data-product-id="{{ $rekomen->id_product }}">
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
              <div class="rp">Rp.</div><span class="product-price">{{ $rekomen->harga }}</span>
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