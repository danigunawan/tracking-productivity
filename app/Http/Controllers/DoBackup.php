<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
class DoBackup extends Controller
{
    //
    public function index (){

    	$backup = Artisan::call('backup:run');
    	echo "Sedang Melakukan Backup ...";
if ($backup == 0) {
	# code...
	echo "Backup Berhasil...";
}
else
{
	echo "Backup Gagal";
}
    	
    }
}
