<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangStudi extends Model
{
    protected $table = 'bidang_studi';

    protected $fillable = [
        'deskripsi'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function jadwalGuru(){
        return $this->hasMany('App\JadwalGuru');
    }

}
