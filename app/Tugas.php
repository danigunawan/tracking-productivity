<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    //

protected $table="tugas";

protected $primaryKey="id_tugas";
    protected $fillable = [
        'nama_tugas', 'deadline','prioritas','id_kategori_tugas','id_user_bertugas','id_user_memberitugas','deskripsi_tugas'
    ];

}
