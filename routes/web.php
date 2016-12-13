<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/do-backup', 'DoBackup@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin', 'middleware'=>['auth','role:admin']], function () {
// Route diisi disini...

	Route::resource('kategori-tugas', 'KategoriTugasController');
	Route::resource('user', 'UserController');

});

Route::group(['prefix'=>'auditor', 'middleware'=>['auth','role:auditor']], function () {
// Route diisi disini...
			Route::resource('tugas', 'TugasController');
});


Route::group(['prefix'=>'member', 'middleware'=>['auth','role:member']], function () {
// Route diisi disini...
	Route::resource('tugas', 'TugasController');
	Route::resource('subtugas', 'SubTugasController');
});

Route::post('tugas/komentar', [
'middleware' => ['auth'],
'as' => 'tugas.komentar',
'uses' => 'TugasController@komentar'
]);

//route untuk menyimpan tugas yang dibuat oleh auditor
Route::post('tugas/store-auditor', [
'middleware' => ['auth','role:auditor'],
'as' => 'tugas.store-auditor',
'uses' => 'TugasController@storeAuditor'
]);

Route::get('tugas/detail/{id}', [
'middleware' => ['auth'],
'as' => 'tugas.detail',
'uses' => 'TugasController@show'
]);

Route::get('tugas/finish/{id}', [
'middleware' => ['auth','role:member'],
'as' => 'tugas.finish',
'uses' => 'TugasController@finish'
]);

Route::get('tugas/confirm/{id}', [
'middleware' => ['auth','role:auditor'],
'as' => 'tugas.confirm',
'uses' => 'TugasController@confirm'
]);

Route::get('tugas/selesai', [
'middleware' => ['auth'],
'as' => 'tugas.selesai',
'uses' => 'TugasController@selesai'
]);

Route::get('tugas/konfirmasi', [
'middleware' => ['auth'],
'as' => 'tugas.konfirmasi',
'uses' => 'TugasController@konfirmasi'
]);


Route::get('subtugas/display/{id}', [
'middleware' => ['auth'],
'as' => 'subtugas.display',
'uses' => 'SubTugasController@display'
]);


