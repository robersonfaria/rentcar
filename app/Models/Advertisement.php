<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{

    protected $fillable = [
        'user_id',
        'uuid',
        'title',
        'description',
        'tags',
        'price',
        'published_at'
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
