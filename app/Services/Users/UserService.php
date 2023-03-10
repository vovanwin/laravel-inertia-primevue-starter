<?php

namespace App\Services\Users;

use App\DTOs\Users\UpdateUserDTO;
use App\DTOs\Users\UserDTO;
use App\Models\User;
use App\Repositories\Users\UserRepository;

class UserService
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function update(User $user, UpdateUserDTO $dto): User
    {
       return $this->userRepository->update(user: $user, dto: $dto);
    }

    /**
     * @throws \Throwable
     */
    public function delete(User $user): void
    {
        $user->tokens->each->delete();
        $user->deleteOrFail();
    }

    public function create(UserDTO $dto): User
    {
        return $this->userRepository->create(dto: $dto);

    }
}
