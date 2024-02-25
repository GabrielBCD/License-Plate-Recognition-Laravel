<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(){
        return view('login');
    }

    public function teste(){



        return view('teste');
    }
}
