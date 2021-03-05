<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['nama' => 'Bunga', 'slug' => 'bunga', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'Bunga Matahari', 'slug' => 'bunga-matahari', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'Sayur', 'slug' => 'sayur', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'Cabai Hias', 'slug' => 'cabai-hias', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'Tanaman', 'slug' => 'tanaman', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
