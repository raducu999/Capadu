<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{

    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = \App\Helpers\AppHelper::instance()->get_page_by_user();

            return $next($request);
        });
        $this->default_allert = '';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $user_page = $this->user;
        return view('home', compact('user_page'));
    }

    public function capapage_page()
    {
        $user_page = $this->user;
        $allert_data = $this->default_allert;
        if ($user_page === null) {
            return view('capapage_first', compact('user_page'));
        }
        else {
            return view('capapage', compact('user_page', 'allert_data'));
        }
    }

    public function first_capacreate () {
        $user_page = $this->user;
        $allert_data = $this->default_allert;
        return view('capapage', compact('user_page', 'allert_data'));
    }
}
