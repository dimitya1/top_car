<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Model
{
    use HasFactory;

    public function reviews(): hasMany
    {
        return $this->hasMany(Review::class);
    }

    public function model(): belongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }
}
