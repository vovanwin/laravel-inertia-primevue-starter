<?php

namespace App\Http\Controllers\Api;

use App\Datatables\PermissionDatatable;
use App\DTOs\Users\Permissions\PermissionDTO;
use App\DTOs\Users\Permissions\UpdatePermissionDTO;
use App\DTOs\Users\Roles\RoleDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Services\Users\Permissions\PermissionsService;
use App\Services\Users\Roles\RoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __construct(private readonly PermissionsService $permissionsService)
    {
    }

    public function index(Request $request, PermissionDatatable $datatable): JsonResponse
    {
        $data = $datatable->make($request);
        return response()->json($data);
    }
    public function store(PermissionRequest $request): JsonResponse
    {
        $dto = new PermissionDTO(
            name: $request->name,
            guard_name: $request->guard_name,
        );
        $permission = $this->permissionsService->create($dto);

        return $this->sendSuccess($permission);
    }
    public function update(PermissionRequest $request, int $permission): JsonResponse
    {
        $data = $request->validated();
        $data = [...$data, 'id' => $permission];
        $dto = new UpdatePermissionDTO(...$data);

        $this->permissionsService->update(dto: $dto);

        return $this->sendSuccess("Role updated successfully");
    }

    public function destroy(int $permission): JsonResponse
    {
        $this->permissionsService->delete(permissionId: $permission);
        return $this->sendSuccess("Разрешение успешно удалено");
    }
}
