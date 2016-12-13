<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriTugas;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;


class KategoriTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
        {
            if ($request->ajax()) {
            $kategori_tugas = KategoriTugas::select(['id', 'nama_tugas']);

            return Datatables::of($kategori_tugas)
            ->addColumn('action', function($kategori_tugas){
            return view('datatable._action', [
            'model' => $kategori_tugas,
            'form_url' => route('kategori-tugas.destroy', $kategori_tugas->id),
            'edit_url' => route('kategori-tugas.edit',$kategori_tugas->id),
            'confirm_message' => 'Yakin mau menghapus ' . $kategori_tugas->nama_tugas . '?'

            ]);
            })->make(true);

            }
            $html = $htmlBuilder
            ->addColumn(['data' => 'nama_tugas', 'name'=>'nama_tugas', 'title'=>'Nama Kategori Tugas'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

            return view('kategori_tugas.index')->with(compact('html'));
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kategori_tugas.index');
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

        $this->validate($request, ['nama_tugas' => 'required|unique:kategori_tugas']);
        $KategoriTugas = KategoriTugas::create($request->all());
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $KategoriTugas->nama_tugas"
        ]);
        return redirect()->route('kategori-tugas.index');

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

$KategoriTugas = KategoriTugas::find($id);
return view('kategori_tugas.edit')->with(compact('KategoriTugas'));

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
        $this->validate($request, ['nama_tugas' => 'required|unique:kategori_tugas,nama_tugas,'. $id]);
        $KategoriTugas = KategoriTugas::find($id);
        $KategoriTugas->update($request->only('nama_tugas'));
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $KategoriTugas->nama_tugas"
        ]);
        return redirect()->route('kategori-tugas.index');

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
        KategoriTugas::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Kategori Tugas berhasil dihapus"
        ]);
        return redirect()->route('kategori-tugas.index');

    }
}
