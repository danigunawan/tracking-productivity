<?php

class trackingProductivityTableSeeder extends Seeder {
    public function run()
    {
        
        DB::table('kategori_tugas')->insert(array(
            
            array(
                'id' => 1,
                'nama_tugas' => 'Klinik',
                'created_at' => '2016-12-08 06:39:40',
                'updated_at' => '2016-12-08 06:39:40',
            ),

            array(
                'id' => 2,
                'nama_tugas' => 'Klinik amanah',
                'created_at' => '2016-12-08 06:39:40',
                'updated_at' => '2016-12-08 06:39:40',
            ),

            array(
                'id' => 3,
                'nama_tugas' => 'Klinik panjang',
                'created_at' => '2016-12-08 06:39:40',
                'updated_at' => '2016-12-08 06:39:40',
            ),

            array(
                'id' => 4,
                'nama_tugas' => 'coba',
                'created_at' => '2016-12-08 07:55:44',
                'updated_at' => '2016-12-08 07:55:44',
            ),

            array(
                'id' => 5,
                'nama_tugas' => 'cobaa',
                'created_at' => '2016-12-08 07:56:33',
                'updated_at' => '2016-12-08 07:56:33',
            ),

            array(
                'id' => 6,
                'nama_tugas' => 'afif',
                'created_at' => '2016-12-08 08:02:40',
                'updated_at' => '2016-12-08 08:02:40',
            ),

            array(
                'id' => 7,
                'nama_tugas' => 'asas',
                'created_at' => '2016-12-08 08:03:41',
                'updated_at' => '2016-12-08 08:03:41',
            ),

            array(
                'id' => 8,
                'nama_tugas' => 'asd',
                'created_at' => '2016-12-08 08:04:03',
                'updated_at' => '2016-12-08 08:04:03',
            ),

        ));
        DB::table('role_user')->insert(array(
            
            array(
                'user_id' => 1,
                'role_id' => 1,
            ),

            array(
                'user_id' => 2,
                'role_id' => 2,
            ),

            array(
                'user_id' => 3,
                'role_id' => 3,
            ),

            array(
                'user_id' => 4,
                'role_id' => 4,
            ),

        ));
        DB::table('roles')->insert(array(
            
            array(
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => NULL,
                'created_at' => '2016-12-08 06:39:39',
                'updated_at' => '2016-12-08 06:39:39',
            ),

            array(
                'id' => 2,
                'name' => 'pimpinan',
                'display_name' => 'Pimpinan',
                'description' => NULL,
                'created_at' => '2016-12-08 06:39:40',
                'updated_at' => '2016-12-08 06:39:40',
            ),

            array(
                'id' => 3,
                'name' => 'auditor',
                'display_name' => 'Auditor',
                'description' => NULL,
                'created_at' => '2016-12-08 06:39:40',
                'updated_at' => '2016-12-08 06:39:40',
            ),

            array(
                'id' => 4,
                'name' => 'member',
                'display_name' => 'Member',
                'description' => NULL,
                'created_at' => '2016-12-08 06:39:40',
                'updated_at' => '2016-12-08 06:39:40',
            ),

        ));
        DB::table('users')->insert(array(
            
            array(
                'id' => 1,
                'name' => 'Admin Larapus',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$ftD0c61FGQEUWrHex05lA.OynAkaC0J8Y4cTSAtZRpgRFx8PvKxYe',
                'remember_token' => 'XBInTpGvlvHxJLa7SoxpWQVWGQMhgrBexfWfiqNKc4XI6E1awpF2ObIb3eXY',
                'created_at' => '2016-12-08 06:39:40',
                'updated_at' => '2016-12-08 07:44:27',
            ),

            array(
                'id' => 2,
                'name' => 'pimpinan Larapus',
                'email' => 'pimpinan@gmail.com',
                'password' => '$2y$10$MAlfjL3n2bA1YdQMT65BjOZ4.bx4WhgX/6DgbV1J77Sk8Z97uLu92',
                'remember_token' => 'yD5qDv5SUFn8chXuQrogALNGbtAK5bTKJkcswt9HPHlYXJMuiqc2s1ruDgRW',
                'created_at' => '2016-12-08 06:39:40',
                'updated_at' => '2016-12-08 07:45:56',
            ),

            array(
                'id' => 3,
                'name' => 'auditor Larapus',
                'email' => 'auditor@gmail.com',
                'password' => '$2y$10$WnhHwu4ipzSEsGUlUzgoh.bmY7rsi0QjcpBcu1slPJqJzXQqdnpI2',
                'remember_token' => NULL,
                'created_at' => '2016-12-08 06:39:40',
                'updated_at' => '2016-12-08 06:39:40',
            ),

            array(
                'id' => 4,
                'name' => 'Sample Member',
                'email' => 'member@gmail.com',
                'password' => '$2y$10$Uf/yGvf1RgIfn7NKFvA26OxUGCQU8mpmv.jXSU4dpYegq6gTkknQ2',
                'remember_token' => NULL,
                'created_at' => '2016-12-08 06:39:40',
                'updated_at' => '2016-12-08 06:39:40',
            ),

        ));
    }
}