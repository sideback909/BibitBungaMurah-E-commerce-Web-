<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bibit/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="/bibit/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/bibit/css/coba3.css">
    <link rel="stylesheet" type="text/css" href="/bibit/css/cat.css">
    <link rel="stylesheet" type="text/css" href="/bibit/css/style1.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="/bibit/css/checkout.css">

    
    <link rel="stylesheet" href="/bibit/css/magnify.css">
    <link rel="stylesheet" type="text/css" href="/bibit/css/quantity.css">

  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-faded fixed-top navbars" style="background-color: #2bbbad; padding:0;">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

 <a class="navbar-brand navbar-tabs" href="/"><img src="/bibit/assets/title1.png" style="width: 121px; height: 20px;"></a>
<div class="navbar-category">
            <div class="category-btn">
              Category
            </div>
          <ul class="category-menu">
            @foreach ($categories as $category)
              <li class="category-dropdown">
                <a href="{{ route('shop.index', ['category' => $category->slug]) }}"><img src="/bibit/assets/logo/{{$category-> logo}} "> {{ $category->nama }}</a>
              </li>
            @endforeach
          </ul>
        </div>
<div class="collapse navbar-collapse" id="nav-content">   
<ul class="navbar-nav ">
<li class="nav-item">
  <form action="/produk/search" method="POST" class="search-toggler form-inline md-2 md-lg-0">
      {{ csrf_field() }}
      <div class="mix">
      <div  class="input-group input-group-sm">
  <div class="input-group-prepend">
    <span class="input-group-text mask" id="mask"></span>
  </div>
  <form action="/produk/search" method="POST" class="form-inline md-2 md-lg-0 ml-2">
    {{ csrf_field() }}
  <input id="cari" type="search" name="cari" class="form-control search" value="{{ request()->input('cari') }}" placeholder="Aku ingin cari bibit.." style="width: 220px; border-left: none;">
  </form>
</div>
</div>
    </form>
</li>
<li class="nav-item">
<a href="{{ route('cart.index') }}"><button class="btn btn-outline-success nav-button-img  my-sm-0" type="submit"></button></a>
</li>
@guest
<li class="nav-item">
<a href="{{ route('login') }}"><button class="btn btn-outline-success  my-sm-0 nav-button" type="submit">Masuk</button></a>
</li>
@else

<li class="nav-item">
    <button class="btn btn-outline-success nav-button" type="submit">
    <span class="username">{{ auth()->user()->name }}</span>
  </button>
</li>

<li class="nav-item">
    <a href="{{ route('order.index', (auth()->user()->name)) }}"><button class="btn btn-outline-success nav-button" type="submit">
    <span>Order List</span>
  </button></a>
</li>


<li class="nav-item">
<a class="btn btn-outline-success navbar-logout " href="{{ route('logout') }}"
onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</li>


@endguest
</ul>
</nav>
      {{-- end navbar --}}

      @yield('side-cart')

      @yield('carousel')

      @yield('category-option')

      @yield('content')

      @yield('kategori-pilihan')
      
      @yield('rekomendasi')

   
        </body>

        <script type="text/javascript" src="/bibit/js/countdown.js"></script>
        <script type="text/javascript" src="/bibit/js/coba3.js"></script>
        <script type="text/javascript" src="/bibit/js/quantity.js"></script>
        <script type="text/javascript" src="/bibit/js/info.js"></script>
      </html>