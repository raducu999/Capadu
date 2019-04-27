<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\File;

class FileController extends Controller
{
    public function upload (Request $request) {

        $request->validate([

            'fileToUpload' => 'required',

		]);

        $fileName = time().'.'.request()->fileToUpload->getClientOriginalExtension();

        request()->fileToUpload->move(public_path('UserFiles'), $fileName);

        return response()->json(['success'=>'You have successfully upload file.']);
        
    }

    public function delete ($id) {
        
    }
}
