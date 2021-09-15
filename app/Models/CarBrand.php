<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class CarBrand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'paused',
    ];

    public function models(): hasMany
    {
        return $this->hasMany(CarModel::class);
    }

    public function reviews(): hasManyThrough
    {
        return $this->hasManyThrough(Review::class, CarModel::class);
    }
}
