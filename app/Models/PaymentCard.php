<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PaymentCard extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


}