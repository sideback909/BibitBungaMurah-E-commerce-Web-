<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'email', 'nama', 'alamat', 'kecamatan', 'kabupaten', 'kodepos', 'nohp', 'subtotal', 'total_harga', 'jasa', 'ongkir', 'error'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }

    public function diskons()
    {
        return $this->belongsToMany('App\Diskon')->withPivot('quantity');
    }
}
