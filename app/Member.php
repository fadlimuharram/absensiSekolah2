<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'kelas_id', 'user_id'
    ];

  

    public function kelas(){
        return $this->belongsTo('App\Kelas','kelas_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    
}
