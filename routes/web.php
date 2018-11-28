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

Route::group(
    [
        'middleware' => ['auth', 'isAdmin']
    ],
    function () {
        Route::resource('adminhome','adminHomeController');
        Route::resource('kelas', 'KelasController', [
            'except' => ['create', 'show', 'edit']
        ]);
        Route::resource('bidangstudi', 'BidangStudiController', [
            'only' => ['index', 'store', 'update', 'destroy']
        ]);
        Route::resource('guru', 'GuruController');
        Route::resource('jadwalguru', 'JadwalGuruController');
        Route::get(
            'jadwalGuruDataTable',
            'JadwalGuruController@guruDataTabele'
        )->name('jadwalGuruDataTable');
        Route::resource('users', 'UserController');

        Route::get('guruDataTable', 'GuruController@guruDataTabele')->name(
            'guruDataTable.data'
        );
        Route::get('kelasDataTable', 'KelasController@kelasDataTable')->name(
            'kelasDataTable'
        );
        Route::resource('rekap', 'RekapController');

        Route::post('data-rekap', 'RekapController@hasil')->name('dataRekap');
        // Route::resource('admprofile', 'ProfileAdminController');
        Route::resource('adminprofil','ProfileController2');
        Route::post('adminprofil', 'ProfileController2@changePass')->name('changePass2');
    }
);

Route::group(
    [
        'middleware' => ['auth', 'isMember']
    ],
    function () {
        Route::get('absensi/{tanggal}', 'AbsensiController@index');
        Route::resource('absensi', 'AbsensiController');
        Route::get('hasil/{tanggal}', 'LaporanController@index');
        Route::resource('hasil', 'LaporanController');
        Route::resource('profile','ProfileController');
        Route::post('profile', 'ProfileController@changePass')->name('changePass');
        // Route::get('changePass','ProfileController@changePass')->name('cP');
    }
);
