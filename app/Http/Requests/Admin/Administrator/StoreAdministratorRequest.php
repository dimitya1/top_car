<?php

namespace App\Http\Requests\Admin\Administrator;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdministratorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'min:3', 'max:60'],
            'email'        => ['required', 'string', 'min:9', 'max:120', 'email', 'unique:users,email'],
            'phone_number' => ['required', 'string', 'min:7', 'max:15'],
            'password'     => ['required', 'min:4', 'max:60'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name'         => __('app.admin.administrator.name'),
            'email'        => __('app.admin.administrator.email'),
            'phone_number' => __('app.admin.administrator.phone_number'),
            'password'     => __('app.admin.administrator.password'),
        ];
    }
}
