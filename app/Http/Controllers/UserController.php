<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreUserRequest;
use App\Http\Services\UserService;
use OpenApi\Annotations as OA;
class UserController extends Controller
{
    private userService $userService;

    public function __construct(userService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @OA\Post(
     *     path="/api/newUser",
     *     summary="Cadastrar um novo usuário",
     *     description="Este endpoint cria um novo usuário no sistema",
     *     security={{"bearerAuth":{}}},
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", description="Nome do usuário"),
     *             @OA\Property(property="email", type="string", description="Email do usuário"),
     *             @OA\Property(property="password", type="string", description="Senha do usuário"),
     *             @OA\Property(property="password_confirmation", type="string", description="Comfirme a senha do usuário")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuário criado com sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", description="Usuário criado com sucesso")
     *         )
     *     ),
     * )
     */
    public function store(StoreUserRequest $request)
    {

        $request->validated();

        $message = $this->userService->createUser([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json(['message' => $message], 201);
    }
}
