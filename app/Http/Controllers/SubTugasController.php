<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\KomentarTugas;
use Laratrust\LaratrustFacade as Laratrust;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\SubTugas;
class SubTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //untuk menampilkan subtugas pertugas yang di pilih
     public function display($id)
    {
        //
        $tugas = Tugas::find($id);
        //data subtugas dengan id tugas yang di pilih
        $SubTugas = SubTugas::where([['id_tugas','=',$id],])->get();
        //passing data subtugas ke view

        return view('subtugas.index',['subtugas' =>   $SubTugas ,'tugas' => $tugas]);


    }
}
