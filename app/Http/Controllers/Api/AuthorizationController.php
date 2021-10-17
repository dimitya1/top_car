<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Authorization\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class AuthorizationController extends Controller
{

    /**
     * @param  LoginRequest  $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function requestToken(LoginRequest $request): JsonResponse
    {
        if (auth()->attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])
        ) {
            $token = $request->user()->createToken('developer');

            return response()->json([
                'data' => (object) [
                    'token' => 'Bearer '.$token->plainTextToken
                ]
            ]);
        }

        throw ValidationException::withMessages([
            'login' => ['The provided credentials are incorrect.'],
        ]);
    }
}
