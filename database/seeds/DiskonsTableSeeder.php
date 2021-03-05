<?php

use App\Diskon;
use Illuminate\Database\Seeder;

class DiskonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Diskon::create([
            'nama' => 'Bunga',
            'slug' => 'bunga',
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
            'harga_awal' => 20000,
            'harga_diskon' => 12000,
            'stok' => 20,
            'isi' => 100,
            'berat' => 0.5,
            'foto1' => 'bunga_kenop.jpg',
            'foto2' => 'bunga_kenop.jpg',
            'foto3' => 'bunga_kenop.jpg',
        ]);

        Diskon::create([
            'nama' => 'Bunga Matahari',
            'slug' => 'bunga-matahari',
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
            'harga_awal' => 20000,
            'harga_diskon' => 12000,
            'stok' => 20,
            'isi' => 100,
            'berat' => 0.5,
            'foto1' => 'bunga_kenop.jpg',
            'foto2' => 'bunga_kenop.jpg',
            'foto3' => 'bunga_kenop.jpg',
        ]);

        Diskon::create([
            'nama' => 'Sayur',
            'slug' => 'sayur',
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
            'harga_awal' => 20000,
            'harga_diskon' => 12000,
            'stok' => 20,
            'isi' => 100,
            'berat' => 0.5,
            'foto1' => 'bunga_kenop.jpg',
            'foto2' => 'bunga_kenop.jpg',
            'foto3' => 'bunga_kenop.jpg',
        ]);

        Diskon::create([
            'nama' => 'Cabai Hias',
            'slug' => 'cabai-hias',
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
            'harga_awal' => 20000,
            'harga_diskon' => 12000,
            'stok' => 20,
            'isi' => 100,
            'berat' => 0.5,
            'foto1' => 'bunga_kenop.jpg',
            'foto2' => 'bunga_kenop.jpg',
            'foto3' => 'bunga_kenop.jpg',
        ]);

        Diskon::create([
            'nama' => 'Tanaman',
            'slug' => 'tanaman',
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
            'harga_awal' => 20000,
            'harga_diskon' => 12000,
            'stok' => 20,
            'isi' => 100,
            'berat' => 0.5,
            'foto1' => 'bunga_kenop.jpg',
            'foto2' => 'bunga_kenop.jpg',
            'foto3' => 'bunga_kenop.jpg',
        ]);
    }
}
