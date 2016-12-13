<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriTugas extends Model
{
    //
    protected $table="kategori_tugas";
protected $primaryKey="id";


protected $fillable = ['nama_tugas'];

}
