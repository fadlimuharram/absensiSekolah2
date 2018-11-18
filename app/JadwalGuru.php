<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalGuru extends Model
{
    protected $table = 'jadwal_guru';

    protected $fillable = [
        'jam_mulai', 'jam_berakhir', 'hari', 'bidang_studi_id', 'guru_id', 'kelas_id'
    ];

    public function guru(){
        return $this->belongsTo('App\guru');
    }

    public function bidangStudi(){
        return $this->belongsTo('App\BidangStudi');
    }
}
