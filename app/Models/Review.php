<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_model_id',
        'title',
        'content',
        'fuel_type',
        'power',
        'engine',
        'consumption_city',
        'consumption_highway',
        'gallery',
    ];

    protected $casts = [
        'gallery' => 'array',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function carModel(): belongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function ratings(): hasMany
    {
        return $this->hasMany(Rating::class);
    }
}
