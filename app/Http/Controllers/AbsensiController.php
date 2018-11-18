<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\User;
use App\Guru;
use App\BidangStudi;
use App\JadwalGuru;
use Auth;
use App\Member;
use App\Kehadiran;
/*
    SELECT * FROM jadwal_guru INNER JOIN guru ON guru.id = jadwal_guru.guru_id
    INNER JOIN kelas ON kelas.id = jadwal_guru.kelas_id
    INNER JOIN bidang_studi ON jadwal_guru.bidang_studi_id = bidang_studi.id
    WHERE jadwal_guru.hari = 'senin' AND kelas.id = 30
*/

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // where('user_id',Auth::user()->id)->get()[0]->kelas_id;
        $curr_kelas = User::select('kelas.deskripsi')
        ->join('kelas','kelas.id','=','users.id_kelas')->where('users.id','=',Auth::user()->id)->get()[0]->deskripsi;
        // dd($curr_kelas);
        // echo Auth::user()->id_kelas;

  $now = \Carbon\Carbon::now()->format('l');
  if($now == "Tuesday"){
    $hari = "selasa";
  }elseif ($now == "Thursday") {
    $hari = "kamis";
  }elseif ($now == "Friday") {
    $hari = "jumat";
  }elseif ($now = "Wednesday") {
    $hari = "rabu";
  }elseif ($now = "Monday") {
    $hari = "senin";;
  }
  $halaman = 10;
  $current_page = 'absensi';
  $sekarang = JadwalGuru::select(
    'jadwal_guru.id',
    'guru.tlpn',
    'guru.NIK',
    'guru.nama',
    'kelas.deskripsi',
    'bidang_studi.deskripsi AS bs',
    'jadwal_guru.hari',
    'jadwal_guru.jam_mulai',
    'jadwal_guru.jam_berakhir',
    'jadwal_guru.hari'
    )
    ->join('guru','guru.id','=','jadwal_guru.guru_id')
    ->join('kelas','kelas.id','=','jadwal_guru.kelas_id')
    ->join('bidang_studi','bidang_studi.id','=','jadwal_guru.bidang_studi_id')
    ->where([
      ['jadwal_guru.hari','=','kamis'],
      ['kelas.id','=',Auth::user()->id_kelas]
    ])->paginate($halaman);
    // dd($sekarang);
    // dd($curr_kelas);

/*
    dd(\Carbon\Carbon::now()->format('Y-m-d'));
    */

    $kehadiran = Kehadiran::select('*')->where('tgl',\Carbon\Carbon::now()->format('Y-m-d'))->get();

        return view('member.absen',compact('sekarang'))->with('current_page',$current_page)->with('kehadiran',$kehadiran);
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
        \App\Kehadiran::create([
          'id_jadwal' => $request->id_jadwal,
          'deskripsi' => $request->deskripsi,
          'id_user' => $request->id_usr,
          'stts' => $request->stts,
          'tgl' => date('Y-m-d')
        ]);
        return redirect(route('absensi.index'));
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
