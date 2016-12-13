<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTugas extends Model
{
    //

protected $table="sub_tugas";

protected $primaryKey="id_subtugas";
    protected $fillable = ['id_tugas',
        'nama_tugas', 'deadline','prioritas','id_kategori_tugas','id_user_bertugas','id_user_memberitugas','deskripsi_tugas'
    ];
}
