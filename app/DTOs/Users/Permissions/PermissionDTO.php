<?php

namespace App\DTOs\Users\Permissions;

class PermissionDTO
{

    public function __construct(
        public readonly string $name,
        public readonly string $guard_name,
    )
    {
    }
}
