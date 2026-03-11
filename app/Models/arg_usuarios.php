<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class arg_usuarios extends Model
{
    protected $table = 'arg_usuarios';
    protected $primaryKey = 'id';
    
    public const PAGINATE = 20;
    
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_edicion';
}
