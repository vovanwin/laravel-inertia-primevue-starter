<?php

declare(strict_types=1);

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

    public function update(UpdateUserDTO $dto): User
    {
        return $this->userRepository->update(dto: $dto);
    }

    /**
     * @throws \Throwable
     */
    public function delete(int $userId): void
    {
        $this->userRepository->delete(userId: $userId);
    }

    public function create(UserDTO $dto): User
    {
        return $this->userRepository->create(dto: $dto);
    }
}
