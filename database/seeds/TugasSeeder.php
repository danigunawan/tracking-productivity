<?php

use Illuminate\Database\Seeder;
use App\Tugas;
class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        $tugas1 = Tugas::create(['nama_tugas' => 'Tugas Pertama', 'id_kategori_tugas' => 1 ,'id_user_bertugas' => 4 ,'deadline' => '2016-11-11','prioritas' => 1 ,'deskripsi_tugas' => 'Deskripsi Tugas 1' ]);

        $tugas2 = Tugas::create(['nama_tugas' => 'Tugas Kedua', 'id_kategori_tugas' => 2 ,'id_user_bertugas' => 4 ,'deadline' => '2016-11-12','prioritas' => 2 ,'deskripsi_tugas' => 'Deskripsi Tugas 2' ]);


    }
}
