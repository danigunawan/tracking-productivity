<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);



        $this->call(UsersSeedeer::class);
         $this->call(KategoriTugasSeeder::class);
           $this->call(TugasSeeder::class);
  $this->call(SubTugasSeeder::class);
           


    }
}
