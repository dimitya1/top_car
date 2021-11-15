<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'min:3', 'max:60'],
            'email'        => [
                'required', 'string', 'min:9', 'max:120', 'email',
                Rule::unique('users', 'email')->ignore($this->route()->user->id),
            ],
            'phone_number' => ['required', 'string', 'min:7', 'max:15'],
            'new_password' => ['nullable', 'min:4', 'max:60'],
            'avatar'       => ['nullable', 'image', 'max:5120', 'dimensions:min_width=100,min_height=200'],
            'permission_access_api'       => ['sometimes', 'in:on'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name'         => __('app.admin.administrator.name'),
            'email'        => __('app.admin.administrator.email'),
            'phone_number' => __('app.admin.administrator.phone_number'),
            'new_password' => __('app.admin.administrator.password'),
            'avatar'       => 'Аватар',
            'permission_access_api'       => 'permission_access_api',
        ];
    }
}
