<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'middleware'=>['auth','isAdmin']
], function(){

    Route::resource('kelas','KelasController',[
        'except'=>['create','show','edit']
    ]);
    Route::resource('bidangstudi','BidangStudiController',[
        'only'=>['index','store','update','destroy']
    ]);
    Route::resource('guru','GuruController');
    Route::resource('jadwalguru','JadwalGuruController');
    Route::resource('users','UserController');

    Route::get('guruDataTable','GuruController@guruDataTabele')->name('guruDataTable.data');
    Route::resource('rekap','RekapController');





});


Route::group([
    'middleware'=>['auth','isMember']
], function(){

    Route::resource('absensi','AbsensiController');
    Route::resource('hasil','LaporanController');

});
