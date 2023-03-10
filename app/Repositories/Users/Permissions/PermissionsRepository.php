<?php

declare(strict_types=1);

namespace App\Repositories\Users\Permissions;

use App\DTOs\Users\Permissions\PermissionDTO;
use App\DTOs\Users\Permissions\UpdatePermissionDTO;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionsRepository
{
    public function findPermissionById(int $permissionsId, array $with = []): Permission|Model
    {
        return Permission::query()->where('id', $permissionsId)->first();
    }

    public function create(PermissionDTO $dto): Permission|Model
    {
        return Permission::create([
            'name' => $dto->name,
            'guard_name' => $dto->guard_name,
        ]);
    }

    public function update(UpdatePermissionDTO $dto): Permission
    {
        $permission = $this->findPermissionById(permissionsId: $dto->id);

        return tap($permission, static fn ($permission) => $permission->update([
            'name' => $dto->name,
            'guard_name' => $dto->guard_name,
        ]));
    }

    public function delete(int $permissionId): void
    {
        $permission = $this->findPermissionById(permissionsId: $permissionId);
        $permission->delete();
    }
}
