<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AuthRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = resolve(AuthRepository::class)->register($request);
        //Create Token
        $token = $user->createToken('TaskToken')->plainTextToken;
        $response = [
            'user'  =>   $user,
            'token' =>   $token
        ];
        return response()->json([
            'user'=>$response,
            "message" => "user has been registered successfully"
        ],Response::HTTP_CREATED);
    }
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */

    public function login(LoginRequest $request)
    {
        //Checking Phone Number
        $user = User::where('phone_number',$request['phone_number'])->first();
        //Checking Password
        if (! $user || ! Hash::check($request['password'] , $user->password) ){
            return  response([
                'message' => 'Invalid phone_number Or Password'
            ],Response::HTTP_UNAUTHORIZED);
        }
        //Create Token
        $token = $user->createToken('TaskToken')->plainTextToken;
        $response = [
            'user'  =>   $user,
            'token' =>   $token
        ];
        return response($response,Response::HTTP_CREATED);
    }

    /**
     * logout / Destroy Token
     *
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out'
        ];
    }
}
