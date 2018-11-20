<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use \App\Guru;
Use \App\Kelas;
use \App\User;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tanggal = null)
    {
        if($tanggal == null){
            $now = \Carbon\Carbon::now()->format('l');
            $tanggal = \Carbon\Carbon::now();
        }else{
            $now = \Carbon\Carbon::createFromFormat('m-d-Y', $tanggal)->format('l');
            $tanggal = \Carbon\Carbon::createFromFormat('m-d-Y',$tanggal);
        }

      if ($now == "Tuesday") {
            $hari = "selasa";
        } elseif ($now == "Thursday") {
            $hari = "kamis";
        } elseif ($now == "Friday") {
            $hari = "jumat";
        } elseif ($now == "Wednesday"){
            $hari = "rabu";
        } elseif ($now == "Monday") {
            $hari = "senin";
        }else{
            $hari = 'hari libur';
        }

        // dd($tanggal->format('Y-m-d'));
      $current_page = 'laporan';
      $data = \App\Kehadiran::select(
        'kehadiran.id',
        'bidang_studi.deskripsi as bs',
        'guru.id as guruid',
        'guru.nama',
        'guru.nik',
        'jadwal_guru.jam_mulai',
        'jadwal_guru.jam_berakhir',
        'jadwal_guru.hari',
        'kelas.id as idkelas',
        'kelas.deskripsi',
        'kehadiran.deskripsi',
        'kehadiran.stts',
        'kehadiran.tgl',
        'guru.tlpn')
      ->join('jadwal_guru','jadwal_guru.id','=','kehadiran.id_jadwal')
      ->join('guru','guru.id','=','jadwal_guru.guru_id')
      ->join('kelas','kelas.id','=','jadwal_guru.kelas_id')
      ->join('bidang_studi','bidang_studi.id','=','jadwal_guru.bidang_studi_id')
      ->where([
        ['kehadiran.id_user','=',Auth::user()->id],
        ['kehadiran.tgl','=',$tanggal->format('Y-m-d')]
      ])->paginate(10);
      // $data = \App\Kehadiran::select('*')
      // ->join('jadwal_guru','jadwal_guru.id','=','kehadiran.id_jadwal')->paginate(10);

    //   $guru = Guru::get();
    //   $kelas = Kelas::get();
      // dd($guru);
        return view('member.hasilLaporan',compact('data','tanggal','hari'))
        ->with('current_page',$current_page);
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
        \App\Kehadiran::find($id)->delete();
        return redirect(route('hasil.index'));
    }
}
