<?php

namespace App\Http\Requests\Admin\Administrator;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdministratorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'       => ['required', 'string', 'min:9', 'max:120', 'email', 'exists:users,email'],
            'password'    => ['required', 'string', 'min:6', 'max:60'],
            'remember_me' => ['sometimes', 'in:on'],
        ];
    }

    public function attributes(): array
    {
        return [
            'email'       => __('app.authorization.email'),
            'password'    => __('app.authorization.password'),
            'remember_me' => __('app.authorization.remember_me'),
        ];
    }
}
