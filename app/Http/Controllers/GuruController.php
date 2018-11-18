<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Guru;
use Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_page = 'guru';
        $halaman = 10;
        $guru = Guru::latest()->paginate($halaman);
        $req_get = request()->input('page', 1);

        return view('admin.guru', compact('guru', 'current_page'))->with(
            'i',
            ($req_get - 1) * $halaman
        );
    }

    public function guruDataTabele()
    {
        $guru = Guru::select([
            'id',
            'nik',
            'nama',
            'email',
            'tlpn',
            'created_at',
            'updated_at'
        ]);
        return DataTables::of($guru)
            ->addColumn('action', function ($guru) {
                $htmlEdit =
                    '<a href="' .
                    route('guru.edit', $guru->id) .
                    '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a> ';

                $htmlForm =
                    '<form action="' .
                    route('guru.destroy', $guru->id) .
                    '" method="POST" id="hapusGuru' .
                    $guru->id .
                    '">
                    ' .
                    $htmlEdit .
                    '
                    ' .
                    csrf_field() .
                    '
                    ' .
                    method_field('DELETE') .
                    '
                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                </form>';
                return $htmlForm;
            })
            ->make(true);
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
        $request->validate([
            'nik' => 'required|unique:guru|max:20',
            'nama' => 'required|max:50',
            'email' => 'required|email|unique:guru,email',
            'tlpn' => 'required'
        ]);

        Guru::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'tlpn' => $request->tlpn
        ]);
        return redirect(route('guru.index'))->with(
            'success',
            'guru berhasil di tambahkan'
        );
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
        $guru = Guru::find($id);
        return view('admin.guruEdit', compact('guru'));
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
            'nik' => 'required|max:20',
            'nama' => 'required|max:50',
            'email' => 'required|email',
            'tlpn' => 'required'
        ]);

        Guru::find($id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'tlpn' => $request->tlpn
        ]);

        return redirect(route('guru.index'))->with(
            'success',
            'guru berhasil di edit'
        );
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        Guru::where([
            'id' => $id
        ])->delete();

        return redirect(route('guru.index'))->with(
            'success',
            'guru berhasil di hapus'
        );
    }
}
