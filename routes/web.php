<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mhs;

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
    return view('welcome', [
        'name' => 'andri'
    ]);
});

Route::controller(Mhs::class)->group(function () {
    Route::get('/mhs/index', 'index');
    Route::get('/mhs/tambah', 'add');
    Route::post('/mhs/simpan', 'save');
});