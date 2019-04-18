<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class PagesController extends Controller
{
    public function main()
    {
        return view("main");
    }

    public function home_page()
    {
        return view('home_page');
    }

    public function dinamic_page($request) {
        return $request;
    } 
}
