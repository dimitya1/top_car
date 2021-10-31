<?php

namespace App\Models;

use \Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission
 * @package App\Models
 */
class Permission extends SpatiePermission
{
    const PERMISSION_MANAGE_ADMINS    = 'manage admins';
    const PERMISSION_MODERATE_REVIEWS = 'moderate reviews';
    const PERMISSION_MODERATE_CARS    = 'moderate car brands and models';
}
