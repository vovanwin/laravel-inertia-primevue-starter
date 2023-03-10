<?php

namespace App\Http\Controllers\Api;

use App\Datatables\RoleDatatable;
use App\DTOs\Users\Roles\RoleDTO;
use App\DTOs\Users\Roles\UpdateRoleDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Services\Users\Roles\RoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(private readonly RoleService $roleService)
    {
    }

    public function index(Request $request, RoleDatatable $datatable): JsonResponse
    {
        $data = $datatable->make($request);
        return response()->json($data);
    }

    public function store(RoleRequest $request)
    {
        $dto = new RoleDTO(
            name: $request->name,
            guard_name: $request->guard_name,
            permissions: $request->permissions
        );
        $role = $this->roleService->create($dto);

        return $this->sendSuccess($role);
    }

    public function update(RoleRequest $request, int $role)
    {
        $data = $request->validated();
        $data = [...$data, 'id' => $role];
        $dto = new UpdateRoleDTO(...$data);

        $this->roleService->update(dto: $dto);

        return $this->sendSuccess("Role updated successfully");
    }

    public function destroy(int $role)
    {
        $this->roleService->delete(roleId: $role);
        return $this->sendSuccess("Role deleted successfully");
    }
}
