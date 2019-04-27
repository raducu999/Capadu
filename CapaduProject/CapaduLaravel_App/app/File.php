<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $connection = "mysql2";
    protected $table = 'user_file';
}
