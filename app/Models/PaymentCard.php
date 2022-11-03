<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\PaymentCard
 *
 * @property-read mixed $avatar
 * @property mixed $locale
 * @property mixed $settings
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \TCG\Voyager\Models\Role|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-write mixed $created_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCard query()
 * @mixin \Eloquent
 */
class PaymentCard extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


}
