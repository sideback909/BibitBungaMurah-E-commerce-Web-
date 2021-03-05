<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/bibit/css/allcart.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  
</head>


<body>


  <div class="projimage"><a href="/"><img class="imgg" src="/bibit/assets/title.png" alt="Bibit Bunga Murah"></a></div>
 
    @if (session()->has('success_message'))
      <div class="alert alert-success text-center">
          {{ session()->get('success_message') }}
      </div>
    @endif
    @if(count($errors) > 0)
      <div class="alert alert-danger text-center">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    
  <main>
    <div class="basket" id="cart_table">
      <div class="basket-module">
        <label for="promo-code">Masukkan Kode Promo</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta">Apply</button>
      </div>
    
      <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">Harga</li>
          <li class="quantity">Jumlah</li>
        </ul>
      </div>
      @foreach (Cart::content() as $item)
          
      
      <div class="basket-product">
   
        <div class="item">
          <div class="product-image">
            <a href="{{ route('produk.show', $item->model->slug) }}"><img src="{{ asset('storage/'.$item->model->foto1) }}" alt="Placholder Image 2" class="product-frame"></a>
          </div>
          <div class="product-details">
            <a href="{{ route('produk.show', $item->model->slug) }}">
            <h1><strong><span class="item-quantity">{{ $item->qty }}</span> x </strong>{{ $item->model->nama }}</h1></a>
            <p><strong>isi :{{ $item->model->isi }}</strong></p>
            <p><strong>Berat : {{ $item->model->berat }}</strong> </p>
          </div>
        </div>
        <div class="price hrga"><?php 
          if($item->model->harga_diskon == 0){
            echo $item->model->harga;
            }else{echo $item->model->harga_diskon;}?></div>
        <div class="quantity">
          <input type="number" value="{{ $item->qty }}" min="1" class="quantity-field" data-id="{{ $item->rowId }}">
        </div>
        <div class="remove">
          <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit">Hapus</button>
          </form>
        </div>
      </div>
      @endforeach

      <a href="{{ route('checkout.index') }}"><button type="button" class="btn btn-success mt-2" style="float: right">
        Bayar Sekarang
      </button></a>

          </div>
        </div>
      </div>
    </div>
    <aside>
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span> Item di keranjang anda</div>
        <div class="summary-subtotal">
            <div class="subtotal-title">Subtotal</div>
            <div class="subtotal-value final-value" id="basket-subtotal">{{ Cart::subtotal() }}</div>
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total">{{ Cart::total() }}</div>
        </div>
        <div class="summary-checkout">
        </div>
      </div>
    </aside>
  </main>


  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    (function(){
      const classname = document.querySelectorAll('.quantity-field')

      Array.from(classname).forEach(function(element){
        element.addEventListener('change', function(){
          const id = element.getAttribute('data-id')
          axios.patch(`/cart/${id}`, {
            quantity: this.value
          })
          .then(function (response) {
            window.location.href = '{{ route('cart.index') }}'
          })
          .catch(function (error) {
            console.log(error);
          });
        })
      })
    })();
  </script>

  <script>
    $(document).on('click', '#bulk_delete', function(){
      var id = [];
      if(confirm("Hapus item?"))
      {
        $('.cart_checkbox:checked').each(function(){
          id.push($(this).val());
        });
        if(id.length > 0)
        {
          $.ajax({
            url:"{{ route('cart.massremove') }}",
            method:"get",
            data:{id:id},
            success:function(data)
            {
              alert(data);
              $('#cart_table').Cart::content().ajax.reload();
            }
          });
        }
        else
        {
          alert("Checklist item mana yang ingin dihapus");
        }
      }
    });
  </script>

</body>

</html>
</body>
<script src="/bibit/js/allcart.js"></script>

</html>