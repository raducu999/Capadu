<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FileRecord;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }

    public function capapage_page()
    {

        return view('capapage');
        
    }

    public function upload_page()
    {
        $files = FileRecord::all()->where('belongtouser_id', '=' , Auth::user()->id);

        $usedcapacity = Auth::user()->used_capacity;
        $totalcapacity = intval(env("USER_DataCapacity"));;

        $percent = $usedcapacity/$totalcapacity*100;

        $data = [
            'files'  => $files,
            'usedcapacity'   => $usedcapacity,
            'totalcapacity' => $totalcapacity,
            'percent' => $percent
        ];

        return view('upload')->with(compact('data', $data));
    }
}
