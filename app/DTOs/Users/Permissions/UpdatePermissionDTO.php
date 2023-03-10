<?php

namespace App\DTOs\Users\Permissions;

class UpdatePermissionDTO
{

    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $guard_name,
    )
    {
    }
}
