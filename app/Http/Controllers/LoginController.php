<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use OpenApi\Annotations as OA;

 /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Login usuário",
     *     description="Este endpoint efetua login no sistema",
     *     tags={"Login"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="email", type="string", description="Email do usuário"),
     *             @OA\Property(property="password", type="string", description="Senha do usuário")
     *         )
     *     ),
     * @OA\Response(
 *     response=200,
 *     description="Usuário logado com sucesso",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="user",
 *             type="object",
 *             description="Detalhes do usuário",
 *             @OA\Property(property="id", type="integer", description="ID do usuário"),
 *             @OA\Property(property="name", type="string", description="Nome do usuário"),
 *             @OA\Property(property="email", type="string", description="Email do usuário"),
 *             @OA\Property(property="email_verified_at", type="string", format="date-time", nullable=true, description="Data de verificação do email"),
 *             @OA\Property(property="created_at", type="string", format="date-time", description="Data de criação do usuário"),
 *             @OA\Property(property="updated_at", type="string", format="date-time", description="Data de atualização do usuário")
 *         ),
 *         @OA\Property(
 *             property="token",
 *             type="string",
 *             description="Token de autenticação do usuário"
 *         )
 *     )
 * )
     * )
     */

class LoginController extends Controller
{
    public function index(Request $request){
        $validate =  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciais inválidas.',
            ], 401);
        }
        
        $token = $user->createToken('login-token')->plainTextToken;
        
        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 200);
    }
}
