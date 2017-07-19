<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{

    protected $fillable = [
        'advertisement_id',
        'file',
        'active',
    ];
}
