<?php

namespace App\Http\Requests\Authorization;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'              => ['required'],
            'email'             => ['required', 'string', 'min:9', 'max:120', 'email', 'unique:users,email'],
            'password'          => ['required', 'string', 'min:6', 'max:60'],
            'show_email'        => ['sometimes', 'in:on'],
            'show_phone_number' => ['sometimes', 'in:on'],
            'remember_me'       => ['sometimes', 'in:on'],
        ];
    }

    public function attributes()
    {
        return [
            'email'             => __('app.authorization.email'),
            'password'          => __('app.authorization.password'),
            'show_email'        => __('app.authorization.show_email'),
            'show_phone_number' => __('app.authorization.show_phone_number'),
            'remember_me'       => __('app.authorization.remember_me'),
        ];
    }
}
