<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return response()->json(['message' => 'Usuário não encontrado!'], 404);
        }
        if(!password_verify($request->input('password'), $user->password)){
            return response()->json(['message' => 'Senha incorreta'], 401);
        }
        return response()->json(['message' => 'Usuario autenticado com sucesso'], 200);
    }

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if($validator->fails()) {
            return response()->json(['message' => $validator->errors()],422);
        }
        if($user) {
            return response()->json(['message' => 'Usuario ja existente!'], 404);
        }
        $newUser = new User();

        $newUser->name = $request->name;
        $newUser->password = $request->password;
        $newUser->email = $request->email;
        $newUser->remember_token = Str::random(10);
        $newUser->save();

        return response()->json(['message' => 'Usuario criado com sucesso!'], 200);
    }
}
