<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FetchInfoController;

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
    return view('home.items');
});

Route::get('/show_items',[FetchInfoController::class,'get_all_prods']);

Route::get('/fetch_data', function () {
    return view('fetch_data.options');
});

Route::get('/get_items_data',[FetchInfoController::class,'arrange_site']);