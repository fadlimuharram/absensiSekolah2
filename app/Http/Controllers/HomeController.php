<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_page = 'home';
        // return view('home', compact('current_page'));
        if (Auth::user()->levelakses == "admin") {
          return redirect(route('kelas.index'));
        }else {
          return redirect(route('absensi.index'));
        }

    }
}

?>
