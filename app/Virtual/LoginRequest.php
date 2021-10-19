<?php


namespace App\Virtual;


/**
 * @OA\Schema(
 *      title="Get authorization token request",
 *      description="Receive auth token",
 *      type="object",
 *      required={"email"},
 *      required={"password"}
 * )
 */

class LoginRequest
{
    /**
     * @OA\Property(
     *      title="email",
     *      description="Your personal account email",
     *      example="example@email.com"
     * )
     *
     * @var string
     */
    public string $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="Your personal account password",
     *      example="StrongPassword"
     * )
     *
     * @var string
     */
    public string $password;
}
