<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Page;

class InteractiveController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = \App\Helpers\AppHelper::instance()->get_page_by_user();

            return $next($request);
        });
        $this->default_allert = '';
    }

    public function capacreate_control(Request $request)
    {
        $user_page = $this->user;
        $allert_data = $this->default_allert;

        
    }
}
