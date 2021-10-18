<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Authorization\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class AuthorizationController extends Controller
{
    /**
     * @OA\Post (
     *      path="/api/v1/token/request",
     *      operationId="getAuthToken",
     *      tags={"Authorization"},
     *      summary="Get bearer auth non-expired token to make authorized requests",
     *      description="Returns authorization token",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Token successfully returned",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid data",
     *          @OA\JsonContent()
     *      )
     *     )
     *
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
