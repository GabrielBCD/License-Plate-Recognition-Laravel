<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $users = User::paginate(8);
        $usertype = Auth()->user()->usertype;
        if ($usertype == "admin"){
            return view('users', ['users' => $users]);
        }

        return redirect()->back();
    }
}
