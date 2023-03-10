<?php

namespace App\DTOs\Users\Roles;

class UpdateRoleDTO
{
    public function __construct(
        public readonly int    $id,
        public readonly string $name,
        public readonly string $guard_name,
        public readonly ?array $permissions,
    )
    {
    }
}
