<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Capadu;

class AppComunicator extends Controller
{
    public function app_validate($request)
    {
        $user = User::where('connection_token', '=', $request)->first();
        $status = array(
            'validity' => !(!($user)),
        );
        return $status;
    }

    public function app_recivecapadus($request, Request $data)
    {
        $user = User::where('connection_token', '=', $request)->first();
        if (!$user || !$data->id) {
            return 0;
        }
        $user_capadu = new Capadu;
        $user_capadu->capadu_id = $data->id;
        $user_capadu->owned_by = $user->id;
        $user_capadu->save();
        return "DONE!";
    }

    public function app_sendcapadus($request)
    {
        $user = User::where('connection_token', '=', $request)->first();
        if (!$user) {
            return 0;
        }

        $capadus = [];
        $capadb = Capadu::all();

        foreach ($capadb as $capa) {
            if ($capa->owned_by == $user->id) {
                $capadus[] = [
                    'capa_id'  => $capa -> capadu_id,
                ];
            }
        }

        return $capadus;
    }
}
