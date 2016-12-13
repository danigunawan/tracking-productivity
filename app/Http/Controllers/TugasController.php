<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\KomentarTugas;
use Laratrust\LaratrustFacade as Laratrust;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Activity;
class TugasController extends Controller
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

        $this->validate($request, [
        'nama_tugas' => 'required',
        'id_kategori_tugas' => 'required',
        'id_user_bertugas' => 'required|numeric',
        'deadline' => 'required',
         'deskripsi_tugas' => 'required'
        ]);

        $deadline = date('Y-m-d', strtotime($request->deadline));

        $tugas = Tugas::create(['nama_tugas' => $request->nama_tugas, 'id_kategori_tugas' => $request->id_kategori_tugas,'id_user_bertugas' => $request->id_user_bertugas,'deadline' => $deadline,'prioritas' => $request->prioritas ,'deskripsi_tugas' => $request->deskripsi_tugas ]);

   Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil membuat Tugas $tugas->nama_tugas "
        ]);
return redirect('/');

    }


 public function storeAuditor(Request $request)
    {


        $this->validate($request, [
        'nama_tugas' => 'required',
        'id_kategori_tugas' => 'required',
        'id_user_bertugas' => 'required|numeric',
        'deadline' => 'required',
         'deskripsi_tugas' => 'required'
        ]);

        $deadline = date('Y-m-d', strtotime($request->deadline));

         $id_user = Auth::user()->id;

        $tugas = Tugas::create(['nama_tugas' => $request->nama_tugas, 'id_kategori_tugas' => $request->id_kategori_tugas,'id_user_bertugas' => $request->id_user_bertugas,'id_user_memberitugas' =>  $id_user,'deadline' => $deadline,'prioritas' => $request->prioritas ,'deskripsi_tugas' => $request->deskripsi_tugas ]);

   Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil membuat Tugas $tugas->nama_tugas "
        ]);

return redirect('/');

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

        $tugas = Tugas::find($id);
        $komentar_tugas = KomentarTugas::with('user')->where('id_tugas','=', $id)->get();


             $komentar_tugas= DB::table('komentar_tugas')
            ->join('users', 'users.id', '=', 'komentar_tugas.id_user')
            
            ->select('komentar_tugas.*', 'users.name', 'users.email')
            ->where('komentar_tugas.id_tugas', '=', $id)
            ->get();
        return  view ('tugas.show',['tugas'=> $tugas,'komentar_tugas' => $komentar_tugas ]);
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

    public function komentar(Request $request)
    {

         $this->validate($request, [
        'isi_komentar' => 'required'
        ]);

      $id_user = Auth::user()->id;
      $tugas = Tugas::find($request->id_tugas);
      $aktifitas = Activity::create(['id_user' => $id_user, 'nama_aktivitas' => "Mengirim Komentar di $tugas->nama_tugas",]);

        $tugas = KomentarTugas::create(['isi_komentar' => $request->isi_komentar, 'id_tugas' => $request->id_tugas,'id_user' =>  $id_user]);

   Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengirim Komentar "
        ]);
        return redirect()->back();
    }

    public function finish($id)
    {
        //Y
        $tanggal = date('Y-m-d');
        $Tugas = Tugas::find($id);
        $Tugas->status_selesai= 1 ; 
        $Tugas->tanggal_selesai=  $tanggal ; 
        $Tugas->save();    

          Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Menyelesaikan Tugas $Tugas->nama_tugas "
        ]);
        return redirect()->back();
    }
     public function confirm($id)
    {
        //Y
        $id_user = Auth::user()->id;
        $tanggal = date('Y-m-d');
        $Tugas = Tugas::find($id);
        $Tugas->status_konfirmasi= 1 ; 
        $Tugas->tanggal_konfirmasi=  $tanggal ; 
        $Tugas->id_user_konfirmasi = $id_user;
        $Tugas->save();    
          Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Mengkonfirmasi Tugas $Tugas->nama_tugas "
        ]);
        return redirect()->back();
    }

    public function selesai(){

         if (Laratrust::hasRole('auditor')) return $this->tugasAuitorSelesai();
        if (Laratrust::hasRole('member')) return $this->tugasMemberSelesai();
          return view('home');
    }

    public function konfirmasi(){

         if (Laratrust::hasRole('auditor')) return $this->tugasAuitorKonfirmasi();
        if (Laratrust::hasRole('member')) return $this->tugasMemberKonfirmasi();
          return view('home');
    }

     protected function tugasAuitorSelesai()
    {

    $judul  = "Tugas Selesai" ;
     $tugass = Tugas::where([ ['status_selesai', '=',1], ['status_konfirmasi', '=', 0],])->get();
    return view('dashboard.auditor', ['tugas' => $tugass,'judul' => $judul]);
    }
    protected function tugasAuitorKonfirmasi()
    {

   $judul  = "Tugas Sudah Dikonfirmasi" ;
     $tugass = Tugas::where([ ['status_selesai', '=',1], ['status_konfirmasi', '=', 1],])->get();
    return view('dashboard.auditor', ['tugas' => $tugass ,'judul' => $judul]);
    }
    protected function tugasMemberSelesai()
    {
          
           $id_user = Auth::user()->id;
           $tugass = Tugas::where([['id_user_bertugas','=',$id_user], ['status_selesai', '=',1], ['status_konfirmasi', '=', 0],])->get();
    return view('dashboard.member', ['tugas' => $tugass]);
    }

     protected function tugasMemberKonfirmasi()
    {
          
           $id_user = Auth::user()->id;
           $tugass = Tugas::where([['id_user_bertugas','=',$id_user], ['status_selesai', '=',1], ['status_konfirmasi', '=', 1],])->get();
    return view('dashboard.member', ['tugas' => $tugass]);
    }



}
