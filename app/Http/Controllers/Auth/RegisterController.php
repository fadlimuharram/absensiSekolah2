<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Member;
use App\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {

        $count = User::get()->count();

        $kelas = Kelas::all();
        return view('auth.register', compact('kelas','count'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

      if(User::get()->count() >=1){

       $validator = Validator::make($data, [
          'firstname' => 'required|string|max:255',
          'lastname' => 'required|string|max:255',
          'id_kelas' => 'required|unique:users',
          'gender' => 'required',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
      ]);
      }else{
          $validator =  Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
          ]);
      }
      return $validator;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $akses = User::get()->count() >= 1 ? 'member' : 'admin';
      $user = User::create([
        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'id_kelas' => $data['id_kelas'],
        'levelakses' => $akses,
        'email' => $data['email'],
        'jk' => $data['gender'],
        'password' => Hash::make($data['password']),
      ]);
      return $user;
    }
}
