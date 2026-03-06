<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios'; // Table's name in Data base
    protected $primaryKey = 'id'; // primaryKey in table
    public $timestamps = false; // This table does not get these columns created_at y updated_at
    public const PAGINATE = 10;
}
