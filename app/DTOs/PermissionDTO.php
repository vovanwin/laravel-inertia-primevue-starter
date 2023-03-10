<?php

namespace App\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class PermissionDTO
{

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $guard_name,
    )
    {
    }
}
