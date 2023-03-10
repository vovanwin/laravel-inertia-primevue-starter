<?php

declare(strict_types=1);

namespace App\Services\Users\Permissions;

use App\DTOs\Users\Permissions\PermissionDTO;
use App\DTOs\Users\Permissions\UpdatePermissionDTO;
use App\Repositories\Users\Permissions\PermissionsRepository;
use Spatie\Permission\Models\Permission;

class PermissionsService
{
    public function __construct(private readonly PermissionsRepository $permissionsRepository)
    {
    }

    public function update(UpdatePermissionDTO $dto): Permission
    {
        return $this->permissionsRepository->update(dto: $dto);
    }

    public function delete(int $permissionId): void
    {
        $this->permissionsRepository->delete(permissionId: $permissionId);
    }

    public function create(PermissionDTO $dto): Permission
    {
        return $this->permissionsRepository->create(dto: $dto);
    }
}
