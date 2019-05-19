<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\File;
use App\User;
use Auth;

class FileController extends Controller
{
    public function upload (Request $request) {

        $user = User::find(Auth::user()->id);
        $user->upload_activity = "nu s-a putut incarca materialul selectat, asigurativa ca ati selectat un material valid";
        $user->save();

        $request->validate([
            'fileToUpload' => 'required',
        ]);

        $usedcapacity = $user->used_capacity;
        $totalcapacity = intval(env("USER_DataCapacity"));
        

        if ($usedcapacity + (request()->fileToUpload->getSize())/1000000 > $totalcapacity) {
            $user->upload_activity = "nu s-a putut incarca materialul selectat, depasiti capacitatea disponibila";
            $user->save();
            return;
        }
        
        $fileName = time().'.'.request()->fileToUpload->getClientOriginalExtension();
        $user->used_capacity = $user->used_capacity + (request()->fileToUpload->getSize())/1000000;
        $user->save();

        $filerecord = new File;
        $filerecord->nume = request()->fileToUpload->getClientOriginalName();
        $filerecord->ruta = $fileName;
        $filerecord->marime = (request()->fileToUpload->getSize())/1000000;
        $filerecord->belongtouser_id = $user->id;
        $filerecord->save();

        request()->fileToUpload->move(public_path('User_Files'), $fileName);

        $user->upload_activity = "materialul a fost incarcat cu succes";
        $user->save();

        return;
        
    }
    public function delete ($id) {
        
    }
}