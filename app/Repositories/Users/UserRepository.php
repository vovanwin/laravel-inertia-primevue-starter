<?php

namespace App\Repositories\Users;

use App\DTOs\Users\UpdateUserDTO;
use App\DTOs\Users\UserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    public function findUserById(int $userId, array $with = []): User|Model
    {
        return User::query()->where('id', $userId)->first();
    }
    public function create(UserDTO $dto): User
    {
        return User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => $dto->password,
        ]);
    }

    public function update(UpdateUserDTO $dto): User
    {
        $user = $this->findUserById(userId: $dto->id);

        return tap($user, static fn($user) => $user->update([
            'name' => $dto->name,
            'email' => $dto->email,
        ]));
    }

    public function delete(int $userId): void
    {
        $user = $this->findUserById(userId: $userId);
        $user->tokens->each->delete();
        $user->deleteOrFail();
    }
}
