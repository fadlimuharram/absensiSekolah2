<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $current_page = "users";
      $kelas = \App\Kelas::all();
      $data = \App\User::select(
        'users.id as id_k',
        'users.firstname',
        'users.lastname',
        'users.email',
        'kelas.id as kelas_id',
        'kelas.deskripsi',
        'users.levelakses')
      ->join('kelas','kelas.id','=','users.id_kelas')
      ->where('users.levelakses','=','member')->paginate(10);
        return view('admin.users',compact('data','kelas'))->with('current_page',$current_page);
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
      User::find($id)->update([
          'firstname'=>$request->fname,
          'lastname'=>$request->lname,
          'id_kelas'=>$request->kelas,
          'email'=>$request->email
      ]);

      return redirect(route('users.index'))->with('success','User berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $a = \App\User::find($id)->delete();
      return redirect(route('users.index'))->with('success','berhasil di delete');
    }
}
