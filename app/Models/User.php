<?php

namespace App\Models;

use App\Observer\UserObserver;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Rdehnhardt\ModelObserver\ModelObserver;


class User extends Authenticatable
{
    use Notifiable, ModelObserver;

    protected static $observer = UserObserver::class;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
