<?php

use App\Http\Controllers\Apis;
use Illuminate\Support\Facades\Route;

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

Route::get('/api/get-input', [Apis::class, 'receivedInput']);
Route::get('/api/list/barang' , [Apis::class, 'getListBarang']);
