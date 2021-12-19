<?php

namespace App\Http\Requests\Front\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'creator_name'         => ['required', 'string', 'max:60'],
            'creator_email'        => ['required_if:creator_phone_number,null', 'string', 'min:9', 'max:120', 'email'],
            'creator_phone_number' => ['required_if:creator_email,null', 'string', 'min:10', 'max:15'],
            'message'              => ['required', 'string', 'min:5', 'max:500'],
        ];
    }

    public function attributes(): array
    {
        return [
            'creator_name'         => __('app.contact_us.creator_name'),
            'creator_email'        => __('app.contact_us.creator_email'),
            'creator_phone_number' => __('app.contact_us.creator_phone_number'),
            'message'              => __('app.contact_us.message'),
        ];
    }
}
