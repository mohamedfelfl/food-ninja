<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Meal
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $type
 * @property string $restaurant
 * @property float $rating
 * @property array $tags
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Meal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereRestaurant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Meal extends Model
{
    use HasFactory;

    protected $casts = [
        'tags' => 'array',
    ];
}
