<?php

namespace App\DTOs\Users;

class UserDTO
{
    public function __construct(
        public readonly string  $name,
        public readonly string  $email,
        public readonly ?string $password,
    )
    {
    }
}
