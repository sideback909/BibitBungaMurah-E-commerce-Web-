<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->unique();
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->text('tips');
            $table->text('keterangan');
            $table->text('ulasan');
            $table->text('rating');
            $table->integer('harga');
            $table->integer('stok');
            $table->integer('isi');
            $table->float('berat');
            $table->string('foto1');
            $table->string('foto2');
            $table->string('foto3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
