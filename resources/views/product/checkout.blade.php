@extends('layout/app')

@section('title','Checkout')

@section('content')
<div style="margin-top:80px;" class="container">
  <main>
    <h3 class="mt-4">Isi Formulir Pengiriman<br>Bibit Bunga Murah</h3><br>
  <div class="row">
    <div class="col">
            
<form action="{{ route('checkout.ongkir') }} " method="POST" class="needs-validation" novalidate>
  {{ csrf_field() }}
  <div class="form-place">

    <div class="form-group">
        <label for="email">email</label>
        {{-- <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required> --}}
        <input type="text" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
    </div>
    <div class="form-group">
        <label for="name">nama</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" readonly>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
    </div>

    <div class="half-form">
        <div class="form-group">
            <label for="kecamatan">Provinsi</label>
            <select name="kecamatan" class="summary-delivery-selection">
            <option value="0" selected="selected">Pilih Provinsi</option>
            @foreach($provinsi as $prov)
              <option value="{{ $prov->id }}">{{ $prov->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="kabupaten">Kota / Kabupaten</label>
            <select name="kabupaten" class="summary-delivery-selection">
            <option value="0" selected="selected">Pilih Kota / Kabupaten</option>
            @foreach($city as $c)
              <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
        <label for="jasa">Jasa Pengiriman</label>
          <select name="jasa" class="summary-delivery-selection">
            <option value="0" selected="selected">Pilih jasa paket</option>
            <option value="jne">JNE</option>
            <option value="pos">POS Indonesia</option>
            <option value="tiki">Tiki</option>
          </select>
        </div>
        
    </div> 

    <div class="half-form">
        <div class="form-group">
            <label for="kodepos">Kode Pos</label>
            <input type="text" class="form-control" id="kodepos" name="kodepos" value="{{ old('kodepos') }}" required>
        </div>
        <div class="form-group">
            <label for="nohp">No HP.</label>
            <input type="text" class="form-control" id="nohp" name="nohp" value="{{ old('nohp') }}" required>
            @foreach (Cart::content() as $item)
            <input type="hidden" class="form-control" id="berat" name="berat" value="{{ $item->model->berat }}" required>
            @endforeach
        </div>
    </div> 

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
</div>
  <button class="btn btn-primary" type="submit">Submit form</button>
  </form>

    </div>
    <div class="col">
          <aside>
      <div class="summary" style="margin-top: 33px;">
        @foreach (Cart::content() as $item)
            
        <div class="basket-product">
                <div class="item">
                  <div class="summary-total-items mb-3"><span class="total-items"></span> Item di keranjang anda</div>
                  <div class="product-image">
                    <img src="{{ asset('storage/'.$item->model->foto1) }}" alt="Placholder Image 2" class="product-frame" style="max-width:150px;">

                    <div class="product-details">
                    <h1 class="custom ml-3"><strong>{{ $item->model->nama }}</strong></h1>
                    <p class="custom ml-3">{{ $item->model->isi }}</p>
                    <p class="custom ml-3">{{ $item->model->berat }}</p>
                      <div class="price custom ml-3"><?php 
                        if($item->model->harga_diskon == 0){
                          echo $item->model->harga;
                          }else{echo $item->model->harga_diskon;}?></div>
                    <p class="custom ml-3">{{ $item->qty }}</p>

                  </div>
                  </div>
                </div>
          </div>
          @endforeach

        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total">{{ Cart::total() }}</div>
        </div>
        <div class="summary-checkout">
        </div>
      </div>
          </aside>
</main>


    


    

<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection