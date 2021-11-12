<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CarModel extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'produced_from',
        'produced_to',
        'gallery',
        'paused',
    ];

    protected $casts = [
        'gallery' => 'array',
    ];

    public const FUEL_TYPE_PETROL = 'petrol';
    public const FUEL_TYPE_DIESEL = 'diesel';
    public const FUEL_TYPE_GAS = 'gas';
    public const FUEL_TYPE_ELECTRIC = 'electric';
    public const FUEL_TYPE_HYBRID = 'hybrid';
    public const FUEL_TYPE_OTHER = 'other';

    public static array $fuelTypes = [
        self::FUEL_TYPE_PETROL,
        self::FUEL_TYPE_DIESEL,
        self::FUEL_TYPE_GAS,
        self::FUEL_TYPE_ELECTRIC,
        self::FUEL_TYPE_HYBRID,
        self::FUEL_TYPE_OTHER,
    ];

    public function reviews(): hasMany
    {
        return $this->hasMany(Review::class);
    }

    public function carBrand(): belongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function ratings(): HasManyThrough
    {
        return $this->hasManyThrough(Rating::class, Review::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
}
