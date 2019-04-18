<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capadu extends Model
{
    protected $connection = "mysql2";
    protected $table = 'user_capadu';
}
