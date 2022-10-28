<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
       $users = User::get();
       return view('welcome' , compact('users'));
    }
}
