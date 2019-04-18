<?php
namespace App\Helpers;

use Auth;
use App\Page;

class AppHelper
{

     public function get_page_by_user()
     {
        $user_id = Auth::id();
        $user = Page::where('owned_by', '=', $user_id)->first();
        return $user;
     }

     public static function instance()
     {
         return new AppHelper();
     }
}