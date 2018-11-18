<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'deskripsi', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function member(){
        return $this->hasMany('App\Member','kelas_id');
    }
}
