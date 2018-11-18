<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Kelas;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'levelakses', 'email', 'password','id_kelas'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getKelas(){
        return Kelas::where('id',Auth::user()->member->kelas_id)->get()->deskripsi;
    }

    public function kelas(){
        return $this->hasMany('App\Kelas');
    }

    public function bidangStudi(){
        return $this->hasMany('App\BidangStudi');
    }

    public function guru(){
        return $this->hasMany('App\Guru');
    }

    public function member(){
        return $this->hasOne('App\Member','user_id');
    }


}
