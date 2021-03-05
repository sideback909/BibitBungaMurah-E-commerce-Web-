<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function presentPrice()
    {
        return ($this->harga);
    }

    // public function image()
    // {
    //     $gambar = $article->image($this->foto1);
    //     return $gambar;
    // }

    public function scopeRekomendasi($query)
    {
        return $query->inRandomOrder()->take(4);
    }


}
