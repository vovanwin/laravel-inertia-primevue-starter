<?php

declare(strict_types=1);

namespace App\Services\Users\Roles;

use App\DTOs\Users\Roles\RoleDTO;
use App\DTOs\Users\Roles\UpdateRoleDTO;
use App\Repositories\Users\Roles\RoleRepository;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function __construct(private readonly RoleRepository $roleRepository)
    {
    }

    public function update(UpdateRoleDTO $dto): Role
    {
        return $this->roleRepository->update(dto: $dto);
    }

    public function delete(int $roleId): void
    {
        $this->roleRepository->delete(roleId: $roleId);
    }

    public function create(RoleDTO $dto): Role
    {
        return $this->roleRepository->create(dto: $dto);
    }
}
