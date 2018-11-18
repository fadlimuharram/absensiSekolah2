<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nik', 'nama', 'email', 'tlpn'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function jadwalguru(){
        return $this->hasMany('App\JadwalGuru');
    }


}
