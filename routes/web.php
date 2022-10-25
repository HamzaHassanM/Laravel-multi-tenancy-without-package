<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function (Request $request) {




    dd(DB::table('categories')->get()->toArray());

    return view('welcome' , compact('host'));
});




Route::get('/admin', function (Request $request) {

dd(DB::getConnections());


    dd(DB::table('categories')->get()->toArray());

    return view('welcome' , compact('host'));
});

