<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class arg_empr_unidades extends Model
{
    protected $table = 'arg_empr_unidades';
    protected $primaryKey = 'unidad_id';
    public $timestamps = false;
    public const PAGINATE = 20;
}
