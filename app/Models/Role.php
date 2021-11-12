<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use \Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role
 * @package App\Models
 */
class Role extends SpatieRole
{
    use LogsActivity;

    const ROLE_USER  = 'User';
    const ROLE_ADMIN = 'Admin';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnlyDirty();
    }
}
