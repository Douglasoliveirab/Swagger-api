<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use OpenApi\Annotations as OA;

class UserController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/user",
     *     summary="Cadastrar um novo usuário",
     *     description="Este endpoint cria um novo usuário no sistema",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", description="Nome do usuário"),
     *             @OA\Property(property="email", type="string", description="Email do usuário"),
     *             @OA\Property(property="password", type="string", description="Senha do usuário"),
     *              @OA\Property(property="password_confirmation", type="string", description="Comfirme a senha do usuário")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuário criado com sucesso",
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
            'password' => Hash::make($request->password),
        ]);

        // Retorno com o usuário criado
       // Retorno com o usuário criado (sem expor a senha)
return response()->json([
    'message' => 'Usuário cadastrado com sucesso!',
    'user' => [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
    ],
], 201);

    }
}
