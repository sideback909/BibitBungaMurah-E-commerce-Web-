<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Bunga
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'nama' => 'Bunga' .$i,
                'slug' => 'bunga-' .$i,
                'deskripsi' => 'Bunga kenop (Gomphrena globosa) adalah terna semusim yang ditanam di halaman belakang ataupun pekarangan sebagai tanaman hias.',
                'tips' => '1.Sebarkan bijinya ke dalam wadah atau tray semai yang telah berisi tanah, sedikit campuran sekam, pasir dan pupuk kompos. Anda bisa memperoleh benih bunga kancing di toko persediaan benih atau bisa juga diambil dari tanaman yang telah tumbuh, tanaman bunga kancing tetangga misalnya.
                2.Siramlah dengan sedikit air atau semprotkan dengan sprayer.
                3.Benih bunga kancing membutuhkan cahaya untuk berkecambah. Tempatkan pada tempat yang terang tapi tidak terkena sinar matahari langsung yang berlebihan karena akan merusak kecambah.
                4.Setelah bibit telah tumbuh sekitar 5-7 cm, pindahkan pada pot yang lebih besar atau lahan di kebun Anda supaya bibit tumbuh dengan baik. Beri jarak sekitar 20-25 cm antar tanaman. Pastikan untuk tidak melukai batang dan akarnya.
                5.Tanaman ini biasanya sudah berbunga 2 hingga 3 bulan sejak disemai dan akan tetap berbunga dalam jangka waktu yang cukup lama.',
                'keterangan' => 'tersedia produk kemasan',
                'ulasan' => 'keren gan',
                'rating' => '<i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>',
                'harga' => rand(17000, 15000),
                'stok' => rand(20, 15),
                'isi' => rand(100, 50),
                'berat' => 0.5,
                'foto1' => 'butter_big.jpeg',
                'foto2' => 'butter_big.jpeg',
                'foto3' => 'butter_big.jpeg',
            ])->categories()->attach(1);
        }

        // Bunga Matahari
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'nama' => 'Bunga Matahari'.$i,
                'slug' => 'bunga-matahari-'.$i,
                'deskripsi' => 'Bunga kenop (Gomphrena globosa) adalah terna semusim yang ditanam di halaman belakang ataupun pekarangan sebagai tanaman hias.',
                'tips' => '1.Sebarkan bijinya ke dalam wadah atau tray semai yang telah berisi tanah, sedikit campuran sekam, pasir dan pupuk kompos. Anda bisa memperoleh benih bunga kancing di toko persediaan benih atau bisa juga diambil dari tanaman yang telah tumbuh, tanaman bunga kancing tetangga misalnya.
                2.Siramlah dengan sedikit air atau semprotkan dengan sprayer.
                3.Benih bunga kancing membutuhkan cahaya untuk berkecambah. Tempatkan pada tempat yang terang tapi tidak terkena sinar matahari langsung yang berlebihan karena akan merusak kecambah.
                4.Setelah bibit telah tumbuh sekitar 5-7 cm, pindahkan pada pot yang lebih besar atau lahan di kebun Anda supaya bibit tumbuh dengan baik. Beri jarak sekitar 20-25 cm antar tanaman. Pastikan untuk tidak melukai batang dan akarnya.
                5.Tanaman ini biasanya sudah berbunga 2 hingga 3 bulan sejak disemai dan akan tetap berbunga dalam jangka waktu yang cukup lama.',
                'keterangan' => 'tersedia produk kemasan',
                'ulasan' => 'keren gan',
                'rating' => '<i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>',
                'harga' => rand(17000, 15000),
                'stok' => rand(20, 15),
                'isi' => rand(100, 50),
                'berat' => 0.5,
                'foto1' => 'matahari.jpg',
                'foto2' => 'matahari.jpg',
                'foto3' => 'matahari.jpg',
            ])->categories()->attach(2);     
        }

        // Sayur
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'nama' => 'Sayur' .$i,
                'slug' => 'sayur-' .$i,
                'deskripsi' => 'Bunga kenop (Gomphrena globosa) adalah terna semusim yang ditanam di halaman belakang ataupun pekarangan sebagai tanaman hias.',
                'tips' => '1.Sebarkan bijinya ke dalam wadah atau tray semai yang telah berisi tanah, sedikit campuran sekam, pasir dan pupuk kompos. Anda bisa memperoleh benih bunga kancing di toko persediaan benih atau bisa juga diambil dari tanaman yang telah tumbuh, tanaman bunga kancing tetangga misalnya.
                2.Siramlah dengan sedikit air atau semprotkan dengan sprayer.
                3.Benih bunga kancing membutuhkan cahaya untuk berkecambah. Tempatkan pada tempat yang terang tapi tidak terkena sinar matahari langsung yang berlebihan karena akan merusak kecambah.
                4.Setelah bibit telah tumbuh sekitar 5-7 cm, pindahkan pada pot yang lebih besar atau lahan di kebun Anda supaya bibit tumbuh dengan baik. Beri jarak sekitar 20-25 cm antar tanaman. Pastikan untuk tidak melukai batang dan akarnya.
                5.Tanaman ini biasanya sudah berbunga 2 hingga 3 bulan sejak disemai dan akan tetap berbunga dalam jangka waktu yang cukup lama.',
                'keterangan' => 'tersedia produk kemasan',
                'ulasan' => 'keren gan',
                'rating' => '<i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>',
                'harga' => rand(17000, 15000),
                'stok' => rand(20, 15),
                'isi' => rand(100, 50),
                'berat' => 0.5,
                'foto1' => 'ciplukan_buah.jpg',
                'foto2' => 'ciplukan_buah.jpg',
                'foto3' => 'ciplukan_buah.jpg',
            ])->categories()->attach(3);
        }

        // Cabai Hias
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'nama' => 'Cabai Hias' .$i,
                'slug' => 'cabai-hias-' .$i,
                'deskripsi' => 'Bunga kenop (Gomphrena globosa) adalah terna semusim yang ditanam di halaman belakang ataupun pekarangan sebagai tanaman hias.',
                'tips' => '1.Sebarkan bijinya ke dalam wadah atau tray semai yang telah berisi tanah, sedikit campuran sekam, pasir dan pupuk kompos. Anda bisa memperoleh benih bunga kancing di toko persediaan benih atau bisa juga diambil dari tanaman yang telah tumbuh, tanaman bunga kancing tetangga misalnya.
                2.Siramlah dengan sedikit air atau semprotkan dengan sprayer.
                3.Benih bunga kancing membutuhkan cahaya untuk berkecambah. Tempatkan pada tempat yang terang tapi tidak terkena sinar matahari langsung yang berlebihan karena akan merusak kecambah.
                4.Setelah bibit telah tumbuh sekitar 5-7 cm, pindahkan pada pot yang lebih besar atau lahan di kebun Anda supaya bibit tumbuh dengan baik. Beri jarak sekitar 20-25 cm antar tanaman. Pastikan untuk tidak melukai batang dan akarnya.
                5.Tanaman ini biasanya sudah berbunga 2 hingga 3 bulan sejak disemai dan akan tetap berbunga dalam jangka waktu yang cukup lama.',
                'keterangan' => 'tersedia produk kemasan',
                'ulasan' => 'keren gan',
                'rating' => '<i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>',
                'harga' => rand(17000, 15000),
                'stok' => rand(20, 15),
                'isi' => rand(100, 50),
                'berat' => 0.5,
                'foto1' => 'celosia_putih.jpg',
                'foto2' => 'celosia_putih.jpg',
                'foto3' => 'celosia_putih.jpg',
            ])->categories()->attach(4);
        }

        // Tanaman
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'nama' => 'Tanaman' .$i,
                'slug' => 'tanaman-' .$i,
                'deskripsi' => 'Bunga kenop (Gomphrena globosa) adalah terna semusim yang ditanam di halaman belakang ataupun pekarangan sebagai tanaman hias.',
                'tips' => '1.Sebarkan bijinya ke dalam wadah atau tray semai yang telah berisi tanah, sedikit campuran sekam, pasir dan pupuk kompos. Anda bisa memperoleh benih bunga kancing di toko persediaan benih atau bisa juga diambil dari tanaman yang telah tumbuh, tanaman bunga kancing tetangga misalnya.
                2.Siramlah dengan sedikit air atau semprotkan dengan sprayer.
                3.Benih bunga kancing membutuhkan cahaya untuk berkecambah. Tempatkan pada tempat yang terang tapi tidak terkena sinar matahari langsung yang berlebihan karena akan merusak kecambah.
                4.Setelah bibit telah tumbuh sekitar 5-7 cm, pindahkan pada pot yang lebih besar atau lahan di kebun Anda supaya bibit tumbuh dengan baik. Beri jarak sekitar 20-25 cm antar tanaman. Pastikan untuk tidak melukai batang dan akarnya.
                5.Tanaman ini biasanya sudah berbunga 2 hingga 3 bulan sejak disemai dan akan tetap berbunga dalam jangka waktu yang cukup lama.',
                'keterangan' => 'tersedia produk kemasan',
                'ulasan' => 'keren gan',
                'rating' => '<i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>',
                'harga' => rand(17000, 15000),
                'stok' => rand(20, 15),
                'isi' => rand(100, 50),
                'berat' => 0.5,
                'foto1' => 'butterdaisy_big.jpg',
                'foto2' => 'butterdaisy_big.jpg',
                'foto3' => 'butterdaisy_big.jpg',
            ])->categories()->attach(5);
        }
    }
}
