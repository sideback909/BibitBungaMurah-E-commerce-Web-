<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploads';

    protected $fillable = ['order_id', 'user_id', 'nama', 'total_harga', 'gambar_bukti'];

    public function bukti()
    {
        return $this->belongsTo('App\Order')->withPivot('total_harga');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}