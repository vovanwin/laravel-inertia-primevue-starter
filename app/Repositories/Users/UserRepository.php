<?php

namespace App\Repositories\Users;

use App\DTOs\Users\UpdateUserDTO;
use App\DTOs\Users\UserDTO;
use App\Models\User;

class UserRepository
{
    public function create(UserDTO $dto): User
    {
        return User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => $dto->password,
        ]);
    }

    public function update(User $user, UpdateUserDTO $dto): User
    {
        return tap($user, static fn($user) => $user->update([
            'name' => $dto->name,
            'email' => $dto->email,
        ]));
    }
}
