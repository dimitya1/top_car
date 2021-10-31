<?php

namespace App\Models;

use \Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role
 * @package App\Models
 */
class Role extends SpatieRole
{
    const ROLE_USER  = 'User';
    const ROLE_ADMIN = 'Admin';
}
