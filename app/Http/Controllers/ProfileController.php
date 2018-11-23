<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curr_kelas = \App\User::select('kelas.deskripsi')
            ->join('kelas', 'kelas.id', '=', 'users.id_kelas')
            ->where('users.id', '=', Auth::user()->id)
            ->get()[0]->deskripsi;
        $current_page = "profile";
        return view('member.profile')->with('current_page',$current_page)->with('curr_kelas',$curr_kelas);
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
      \App\User::find($id)->update([
        'firstname' => $request->fname,
        'lastname'  => $request->lname,
        'email'     => $request->email,
        'jk'        => $request->gender
      ]);
      return redirect(route('profile.index'))->with('success',"success ubah data")->with('stts',1);

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

    public function changePass(Request $request)
    {
      // echo "string";
      // dd($request);
      $request->validate([
        'password' => 'required|min:6|confirmed'
      ]);
      if (!(Hash::check($request->get('current-password'),Auth::user()->password))) {
        return redirect(route('profile.index'))->with('error',"Your current password does not matches with the password you provided. Please try again");
        // dd("kapal oleng");
      }else {

        Auth::user()->update([
           'password' => Hash::make($request->password)
       ]);
        return redirect(route('profile.index'))->with('success',"berhasil ubah pw");
      };
     // if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
     //   return redirect(route('profile.index'))->with('error',"New Password cannot be same as your current password. Please choose a different password.");
     // };



     // $validatedData = $request->validate([
     //   'current-password' => 'required',
     //   'new-password' => 'required|string|min:6|confirmed'
     // ]);

    }

}
