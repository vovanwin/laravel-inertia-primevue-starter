<?php

declare(strict_types=1);

namespace App\DTOs\Users\Permissions;

class PermissionDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $guard_name,
    ) {
    }
}
