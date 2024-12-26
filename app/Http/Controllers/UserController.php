<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use OpenApi\Annotations as OA;

class UserController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/newusers",
     *     summary="Cadastrar um novo usuário",
     *     description="Este endpoint cria um novo usuário no sistema",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", description="Nome do usuário"),
     *             @OA\Property(property="email", type="string", description="Email do usuário"),
     *             @OA\Property(property="password", type="string", description="Senha do usuário")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuário criado com sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", description="ID do usuário"),
     *             @OA\Property(property="name", type="string", description="Nome do usuário"),
     *             @OA\Property(property="email", type="string", description="Email do usuário")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Dados inválidos",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", description="Mensagem de erro")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Retorno com o usuário criado
        return response()->json($user, 201);
    }
}
