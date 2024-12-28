<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
class UserController extends Controller
{
    private userService $userService;

    // Injeção de Dependência do UserService
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
     *     @OA\Response(
     *         response=400,
     *         description="Dados inválidos",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", description="Dados inválidos")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos na requisição
       $user =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Chamada ao serviço para criar o usuário
        $message = $this->userService->createUser([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Retorna a mensagem de sucesso ou erro
        return response()->json([
            'message' => $message
        ], 201);
    }
}
