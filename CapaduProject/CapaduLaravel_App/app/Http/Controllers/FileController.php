<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\File;
use App\User;

class FileController extends Controller
{
    public function upload (Request $request) {

        $user = User::find(Auth::user()->id);
        $user->upload_activity = "nu s-a putut incarca materialul selectat, asigurativa ca ati selectat un material valid";
        $user->save();

        $request->validate([
            'fileToUpload' => 'required',
        ]);
        
        $fileName = time().'.'.request()->fileToUpload->getClientOriginalExtension();

        request()->fileToUpload->move(public_path('User_Files'), $fileName);

        $user->upload_activity = "materialul a fost incarcat cu succes";
        $user->save();

        return;
        
    }
    public function delete ($id) {
        
    }
}