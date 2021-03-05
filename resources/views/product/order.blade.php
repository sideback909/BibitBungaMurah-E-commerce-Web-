@extends('layout.app')

@semargin: 0 0 0 1em;tion('title','Order Produk')

@section('content')
 <link rel="stylesheet" type="text/css" href="/bibit/css/order.css">
    <table class="table" style="margin:80px 0 0 0;">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Produk Order</th>
                <th scope="col">Harga Total</th>
                <th scope="col">Upload Bukti Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $item)
            
            <tr>
                <th scope="row">{{ $item->id }}</th>
                {{-- <td><a href="" class="btn btn-success">Lihat Product</a></td> --}}
                
                    <td><?php foreach($leagues as $leag){ echo "$leag->nama"; echo "<br>"; }?></td>
                
                <td>Rp.{{ $item->total_harga }}</td>
                <td><a href="{{ route('upload.index', $item->id) }}"><button class="btn btn-success">Upload</button></a></td>
            </tr>
            @endforeach
        
            {{-- @foreach ($orderss as $itemss)
            
            <tr>
                <th scope="row">{{ $itemss->nama }}</th>
            </tr>
            @endforeach --}}
                
        </tbody>
    </table>
@endsection