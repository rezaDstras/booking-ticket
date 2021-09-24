<?php


namespace App\Http\Repositories;


use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthRepository
{
    public function Register(RegisterRequest $request)
    {
        return User::create([
            'name'         => $request['name'],
            'phone_number' => $request['phone_number'],
            'password'     => bcrypt($request['password'])
        ]);
    }
}
