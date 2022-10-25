<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Address extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
