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

        $option1 = false;
        $option2 = false;

        //Validare Step 1

        if ($request->pageredirect) {
            $option1 = true;
        }
        if ($request->ruta || $request->description) {
            $option2 = true;
        }

        if ($option1 && $option2) {
            $allert_data = 'Nah ah ah... Nu am putut trimite răspunsul. Asigurați-vă că nu faceți nimic dubios.';
            return view('capapage', compact('user_page', 'allert_data'));
        }

        if (!$option1 && !$option2) {
            $allert_data = 'Nu ati completat nici un câmp';
            return view('capapage', compact('user_page', 'allert_data'));
        }

        if ($option2) {
            if (!$request->ruta) {
                $allert_data = 'Completati va rog campul "Calea de acces"';
                return view('capapage', compact('user_page', 'allert_data'));
            }
            if (!$request->description) {
                $allert_data = 'Completati va rog campul "Descriere"';
                return view('capapage', compact('user_page', 'allert_data'));
            }
        }

        //Validare Step 2

        if ($option2) {
            if (strpos($request->ruta, ' ' , 0) || strpos($request->ruta, '!' , 0) || strpos($request->ruta, '~' , 0) || strpos($request->ruta, '@' , 0) || strpos($request->ruta, '#' , 0) || strpos($request->ruta, '$' , 0) || strpos($request->ruta, ':' , 0) || strpos($request->ruta, ';' , 0)) {
                $allert_data = 'Asigurativa ca nu ati introdus urmatoarete caractere : " ","!","~","@","#","$",":",";" in campul "Calea de acces" ';
                return view('capapage', compact('user_page', 'allert_data'));
            }
        }

        //Validare Step 3

        $page_mach = Page::where('route', '=', $request->ruta)->first();

        if ($this->user) {

            if ($page_mach) {
                if ($page_mach->route && $page_mach->owned_by != Auth::id()) {
                    $allert_data = 'Calea de acces este deja folosita de alt utilizator';
                    return view('capapage', compact('user_page', 'allert_data'));
                }
            }

            if ($option1) {
                $this->user->is_redirected = true;
                $this->user->redirect_to = $request->pageredirect;
            }
            else {
                $this->user->is_redirected = false;
                $this->user->description = $request->description;
                $this->user->route = $request->ruta;
            }
            $this->user->save();
        }
        else {
            if ($page_mach) {
                $allert_data = 'Calea de acces este deja folosita de alt utilizator';
                return view('capapage', compact('user_page', 'allert_data'));
            }

            $Created_Page = new Page;
            $Created_Page->owned_by = Auth::id();
            
            if ($option1) {
                $Created_Page->is_redirected = true;
                $Created_Page->redirect_to = $request->pageredirect;
            }
            else {
                $Created_Page->is_redirected = false;
                $Created_Page->description = $request->description;
                $Created_Page->route = $request->ruta;
            }

            $Created_Page->save();
        }
        $this->user = \App\Helpers\AppHelper::instance()->get_page_by_user();
        return view('capapage', compact('user_page', 'allert_data'));
    }
}
