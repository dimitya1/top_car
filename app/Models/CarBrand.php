<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CarBrand extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'logo',
        'paused',
    ];

    public function carModels(): hasMany
    {
        return $this->hasMany(CarModel::class);
    }

    public function reviews(): hasManyThrough
    {
        return $this->hasManyThrough(Review::class, CarModel::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
}
