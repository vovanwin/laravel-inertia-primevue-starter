<?php

namespace App\Http\Controllers\Api;

use App\Datatables\UserDatatable;
use App\DTOs\Users\UpdateUserDTO;
use App\DTOs\Users\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\UserRequest;
use App\Models\User;
use App\Services\Users\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function index(Request $request, UserDatatable $datatable): JsonResponse
    {
        $data = $datatable->make($request);
        return response()->json($data);
    }

    public function store(UserRequest $request): JsonResponse
    {
        //abort_if(!auth()->user()->admin, 403);

        $dto = new UserDTO(
            name: $request->name,
            email: $request->email,
            password: Hash::make($request->password)
        );

        $user = $this->userService->create($dto);

        return response()->json([
            'success' => true,
            'message' => __('auth.created'),
            'data' => $user
        ]);
    }

    public function update(
        UpdateUserRequest $request,
        User        $user,
    ): JsonResponse
    {
        $dto = new UpdateUserDTO(
            name: $request->name,
            email: $request->email,
        );

        $this->userService->update(user: $user, dto: $dto);

        return response()->json([
            'success' => true,
            'message' => __('auth.updated'),
        ]);
    }

    public function destroy(User $user): JsonResponse
    {
        // abort_if(!auth()->user()->admin, 403);

        $user->delete();
        return response()->json(['message' => __('auth.deleted')]);
    }
}
