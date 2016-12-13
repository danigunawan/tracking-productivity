<?php

use Illuminate\Database\Seeder;
use App\KategoriTugas;

class KategoriTugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $kategori1 = KategoriTugas::create(['nama_tugas'=>'Klinik']);
        $kategori2 = KategoriTugas::create(['nama_tugas'=>'Klinik amanah']);
        $kategori3 = KategoriTugas::create(['nama_tugas'=>'Klinik panjang']);

    }
}
