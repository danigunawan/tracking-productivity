<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarTugas extends Model
{
    //
      protected $table="komentar_tugas";
protected $primaryKey="id_komentar_tugas";


protected $fillable = ['isi_komentar','id_user','id_tugas'];

 public function user()
    {
        return $this->belongsTo('App\User');
    }
}
