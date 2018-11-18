<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = \App\Kehadiran::get()[0];
        // dd($item->created_at)

        $id = \Carbon\Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $item->created_at
        )->format('Y-m-d');
        /*
      SELECT jadwal_guru.jam_mulai,jadwal_guru.jam_berakhir,kehadiran.tgl,bidang_studi.deskripsi as 'mapel',kelas.deskripsi,kehadiran.stts,kehadiran.deskripsi as 'why' FROM `kehadiran`
      INNER JOIN jadwal_guru ON jadwal_guru.id = kehadiran.id_jadwal
      INNER JOIN bidang_studi ON bidang_studi.id = jadwal_guru.bidang_studi_id
      INNER JOIN kelas ON kelas.id = jadwal_guru.kelas_id
      */
        $data = \App\Kehadiran::select(
            'jadwal_guru.jam_mulai',
            'jadwal_guru.jam_berakhir',
            'kehadiran.tgl',
            'bidang_studi.deskripsi as "mapel"',
            'kelas.deskripsi',
            'kehadiran.stts',
            'kehadiran.deskripsi as "why"'
        )
            ->join('jadwal_guru', 'jadwal_guru.id', '=', 'kehadiran.id_jadwal')
            ->join(
                'bidang_studi',
                'bidang_studi.id',
                '=',
                'jadwal_guru.bidang_studi_id'
            )
            ->join('kelas', 'kelas.id', '=', 'jadwal_guru.kelas_id');
        $guru = Guru::get();
        $current_page = "rekap";
        return view('admin.rekap')
            ->with("current_page", $current_page)
            ->with('guru', $guru);
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

    public function hasil(Request $request)
    {
        $data = \App\Kehadiran::select(
            'jadwal_guru.jam_mulai',
            'jadwal_guru.jam_berakhir',
            'kehadiran.tgl',
            'bidang_studi.deskripsi as mapel',
            'kelas.deskripsi',
            'kehadiran.stts',
            'kelas.deskripsi as kelas',
            'kehadiran.deskripsi as "why"'
        )
            ->join('jadwal_guru', 'jadwal_guru.id', '=', 'kehadiran.id_jadwal')
            ->join(
                'bidang_studi',
                'bidang_studi.id',
                '=',
                'jadwal_guru.bidang_studi_id'
            )
            ->join('kelas', 'kelas.id', '=', 'jadwal_guru.kelas_id')
            ->whereMonth('kehadiran.tgl', $request->bulan)
            ->whereYear('kehadiran.tgl', $request->tahun)
            ->where('jadwal_guru.guru_id', $request->guru)
            ->get();

        $current_page = "listRekap";
        return view('admin.listDataRekap')
            ->with("data", $data)
            ->with("current_page", $current_page);
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
}
