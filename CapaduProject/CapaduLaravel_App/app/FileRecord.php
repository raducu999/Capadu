<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileRecord extends Model
{
    protected $connection = "mysql2";
    protected $table = 'user_file';
}
