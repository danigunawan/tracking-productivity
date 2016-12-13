<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //

protected $table="activities";

protected $primaryKey="id";
    protected $fillable = [
        'id_user', 'nama_aktivitas','link'
    ];

}
