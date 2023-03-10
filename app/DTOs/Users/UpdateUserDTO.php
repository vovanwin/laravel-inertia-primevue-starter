<?php

declare(strict_types=1);

namespace App\DTOs\Users;

class UpdateUserDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
    ) {
    }
}
