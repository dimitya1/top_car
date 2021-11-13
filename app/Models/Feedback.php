<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Feedback extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'feedback';

    protected $fillable = [
        'created_by',
        'handled_by',
        'message',
        'created_name',
        'created_email',
        'created_phone_number',
        'is_handled',
        'comment',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function administrator(): belongsTo
    {
        return $this->belongsTo(User::class, 'handled_by');
    }
}
