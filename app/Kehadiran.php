<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $table = "kehadiran";

    protected $fillable = [
        'id_jadwal', 'deskripsi','stts','id_user', 'tgl'
    ];
}
