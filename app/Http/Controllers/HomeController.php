<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;
use App\Tugas;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Laratrust::hasRole('auditor')) return $this->auditorDashboard();
        if (Laratrust::hasRole('member')) return $this->memberDashboard();

     
        return view('home');

    }

     protected function auditorDashboard()
    {
             $tugass = Tugas::orderBy('created_at', 'desc')->get();;
    return view('dashboard.auditor', ['tugas' => $tugass]);
    }
    protected function memberDashboard()
    {
          
           $id_user = Auth::user()->id;
           $tugass = Tugas::where('id_user_bertugas','=',$id_user)->orderBy('created_at', 'desc')->get();
    return view('dashboard.member', ['tugas' => $tugass]);
    }

}
