<?php

namespace App\Service;

use App\Http\Resources\AuthResource;
use App\Models\User;
use App\Repository\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register($request){
        try {
            $dados = [];
            $dados['cod'] = (string) Str::uuid();

            //$dados['tenant_id'] = 1;

            if(isset($request['name'])){
                $dados['name'] = $request['name'];
                $dados['login'] = Str::slug($request['name'], '_');
            }

            if(isset($request['email'])){
                $dados['email'] = $request['email'];
            }

            if(isset($request['password'])){
                $dados['password'] = bcrypt($request['password']);
            }

            $dados['tipo'] = 'user';

            $dados['status'] = intval(1);

            $usuario = $this->authRepository->salvarUsuario($dados);

            return new AuthResource($usuario);

        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'message' => $ex->getMessage()], 401);
        }

    }

    public function login($request){
        try {

            if(!Auth::attempt($request)){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request['email'])->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'message' => $ex->getMessage()
            ], 401);
        }

    }
}
