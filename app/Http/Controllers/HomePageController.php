<?php

namespace App\Http\Controllers;

use App\Facade\Tenants;
use App\Models\User;
use App\Service\Tenants;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){

       return  Tenants::getTenant();
       $users = User::get();
       return view('welcome' , compact('users'));
    }
}
