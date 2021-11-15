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
    const PERMISSION_MODERATE_USERS    = 'moderate users';
    const PERMISSION_ACCESS_FOR_DEVELOPERS    = 'access for developers API';

    public static array $allPermissions = [
        self::PERMISSION_MANAGE_ADMINS,
        self::PERMISSION_MODERATE_REVIEWS,
        self::PERMISSION_MODERATE_CARS,
        self::PERMISSION_MODERATE_USERS,
        self::PERMISSION_ACCESS_FOR_DEVELOPERS,
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
}
