<?php

namespace App\Http\Requests\Authorization;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'login'    => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ];
    }

    public function attributes(): array
    {
        return [
            'login'    => __('app.authorization.login'),
            'password' => __('app.authorization.password'),
        ];
    }
}
