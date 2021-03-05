@component('mail::message')
# Order Received

Thank you for your order.

**Order ID:** {{ $order->id }}

**Order Email:** {{ $order->email }}

**Order Name:** {{ $order->nama }}

**Order Alamat:** {{ $order->alamat }}, {{ $order->kecamatan }}, {{ $order->kabupaten }}

**Order Kode Pos:** {{ $order->kodepos }}

**Order Nomor Hp:** {{ $order->nohp }}

**Ongkir:** Rp.{{ $order->ongkir }}

**Order Total:** Rp.{{ $order->total_harga }}

**Items Ordered**

@foreach ($order->products as $product)<br>
Name: {{ $product->nama }} <br>
Price: <?php if($product->harga_diskon == 0){ echo $product->harga; }else{ echo $product->harga_diskon;}?>.Rp <br>
Quantity: {{ $product->pivot->quantity }} <br>
@endforeach

You can get further details about your order by logging into our website.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}
@endcomponent