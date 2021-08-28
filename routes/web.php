<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\editTable;
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


Route::get("/",[editTable::class,'viewT']);
Route::post("/edit",[editTable::class,'updateintable']);
Route::post("/delete",[editTable::class,'destroy']);


Route::get('/table/{a}/{b}/{c}', function ($a, $b, $c) {
    return view('table',['a'=>$a, 'b'=>$b, 'c'=>$c]);
});

Route::get('/table/{a}', function ($a) {
    return view('tabledelete',['a'=>$a]);
});