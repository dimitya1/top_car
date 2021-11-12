<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Rating extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'user_id',
        'review_id',
        'value',
    ];

    public const VALUE_LIKE = 'like';
    public const VALUE_DISLIKE = 'dislike';

    public static array $values = [
        self::VALUE_LIKE,
        self::VALUE_DISLIKE,
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function review(): belongsTo
    {
        return $this->belongsTo(Review::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
}
