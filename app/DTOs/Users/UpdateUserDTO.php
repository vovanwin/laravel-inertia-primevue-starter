<?php

namespace App\DTOs\Users;

class UpdateUserDTO
{
    public function __construct(
        public readonly int  $id,
        public readonly string  $name,
        public readonly string  $email,
    )
    {
    }
}
