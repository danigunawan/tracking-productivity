<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleUser;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
        {
            if ($request->ajax()) {
            $user =  DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.name','users.id','role_user.role_id','users.email', 'roles.display_name')
            ->get();
            return Datatables::of($user)
            ->addColumn('action', function($user){
            return view('datatable._action', [
            'model' => $user,
            'form_url' => route('user.destroy', $user->id),
            'edit_url' => route('user.edit',$user->id),
            'confirm_message' => 'Yakin mau menghapus ' . $user->name . '?'

            ]);
            })->make(true);
            }
            $html = $htmlBuilder
            ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
            ->addColumn(['data' => 'email', 'name'=>'email', 'title'=>'Email'])
            ->addColumn(['data' => 'display_name', 'name'=>'display_name', 'title'=>'Role'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
            return view('user.index')->with(compact('html'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return redirect()->route('user.index');;
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
    
        $role_user = RoleUser::find($id);

        return view('user.edit')->with(compact('role_user')); ;

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

     $this->validate($request, ['role_id' => 'required']);
        $user = User::find($id);
        $RoleUser = RoleUser::find($id);
        $RoleUser->update($request->only('role_id'));
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan Role $user->email"
        ]);
        return redirect()->route('user.index');
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
        $user = User::find($id);
         User::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"User $user->email berhasil dihapus"
        ]);
        return redirect()->route('user.index');

    }
}
