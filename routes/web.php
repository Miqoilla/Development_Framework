<?php

use App\Http\Controllers\BukuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakBukuController;
use App\Http\Controllers\LoginRegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function() {
    return 'Hello World';
});

Route::view('/hello','hello');

Route::get('/coba/{id}', function (string $id) {
    return view('coba', ['id' => $id]);
});

Route::view('/biodata', 'biodata');

Route::post('/biodata', function (Request $request) {
    $output = "Nama: . $request->nama. <br>
            Email: . $request->email. <br>
            No. Hp.: $request->no_hp.";
    return $output;
});

Route::get('/buku-latihan', function () {
    $data = [];
    $data['poin'] = 83;
    $data['flag'] = '2';
    $data['sub_judul'] = 'latihan parsing data di view';
    $data['buku'] = ['buku 1', 'buku 2', 'buku 3', 'buku 4', 'buku 5'];
    return view('buku/list', $data);
});

Route::resource('rak_buku', RakBukuController::class);

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register')->middleware('guest');
    Route::post('/store', 'store')->name('store')->middleware('guest');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/authenticate', 'authenticate')->name('authenticate')->middleware('guest');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    });  

Route::post('/rak_buku/ajax_store',[RakBukuController::class, 'ajax_store']);

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku-create', [BukuController::class, 'create']);
Route::post('/buku-create', [BukuController::class, 'store']);

Route::put('/buku-edit/{id}', [BukuController::class, 'edit']);
Route::post('/buku-edit', [BukuController::class, 'update']);

Route::delete('/buku-hapus/{id}', [BukuController::class, 'destroy']);