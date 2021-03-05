@component('mail::message')
# Order Received

Thank you for your order.

**Order ID:** {{ $order->id }}

**Items Ordered**

@foreach ($order->products as $product)<br>
Name: {{ $product->nama }} <br>
Price: Rp.<?php if($product->harga_diskon == 0){ echo $product->harga; }else{ echo $product->harga_diskon;}?> <br>
Quantity: {{ $product->pivot->quantity }} <br><br>
@endforeach
Ongkir: Rp.{{ $order->ongkir }}<br>
Total Harga: Rp.{{ $order->total_harga }}<br>

You can get further details about your order by logging into our website.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Terimakasih telah berbelanja di tempat kami.

{{ $order->nama }},<br>
bibitbunga.co.id
@endcomponent