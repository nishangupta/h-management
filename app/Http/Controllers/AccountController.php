<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){
        return redirect(route('admin.index'));
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
