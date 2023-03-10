<?php

declare(strict_types=1);

namespace App\Repositories\Users\Roles;

use App\DTOs\Users\Roles\RoleDTO;
use App\DTOs\Users\Roles\UpdateRoleDTO;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function findRoleById(int $roleId, array $with = []): Role|Model
    {
        return Role::query()->where('id', $roleId)->first();
    }

    public function create(RoleDTO $dto): Role|Model
    {
        return Role::create([
            'name' => $dto->name,
            'guard_name' => $dto->guard_name,
        ]);
    }

    public function update(UpdateRoleDTO $dto): Role
    {
        $role = $this->findRoleById(roleId: $dto->id);

        return tap($role, static fn ($role) => $role->update([
            'name' => $dto->name,
            'guard_name' => $dto->guard_name,
        ]));
    }

    public function delete(int $roleId): void
    {
        $role = $this->findRoleById(roleId: $roleId);
        $role->deleteOrFail();
    }
}
