<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $connection = "mysql2";
    protected $table = 'user_page';
}
