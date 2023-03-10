<?php

declare(strict_types=1);

namespace App\DTOs\Users\Roles;

class RoleDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $guard_name,
        public readonly ?array $permissions,
    ) {
    }
}
