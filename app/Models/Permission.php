<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use \Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission
 * @package App\Models
 */
class Permission extends SpatiePermission
{
    use LogsActivity;

    const PERMISSION_MANAGE_ADMINS    = 'manage admins';
    const PERMISSION_MODERATE_REVIEWS = 'moderate reviews';
    const PERMISSION_MODERATE_CARS    = 'moderate car brands and models';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
}
