<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Kelas;
use Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_page = 'kelas';
        $halaman = 10;
        $kelas = Kelas::latest()->paginate($halaman);
        $req_get = request()->input('page',1);

        return view('admin.kelas', compact('kelas','current_page'))->with('i',
            ($req_get-1)*$halaman
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi'=>'required'
        ]);

        Kelas::create([
            'deskripsi'=> $request->deskripsi,
        ]);
        return redirect(route('kelas.index'))->with('success','kelas berhasil di tambahkan');
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
        $request->validate([
            'deskripsi'=>'required'
        ]);

        Kelas::find($id)->update([
            'deskripsi'=>$request->deskripsi
        ]);

        return redirect(route('kelas.index'))->with('success','kelas berhasil di edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::find($id)->delete();

        return redirect(route('kelas.index'))->with('success','kelas berhasil di hapus');
    }
}
