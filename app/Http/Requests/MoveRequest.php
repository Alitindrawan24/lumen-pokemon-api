<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class MoveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'limit' => 'nullable|integer|min:0',
            'offset' => 'nullable|integer|min:0',
            'type' => 'nullable|string',
            'category' => 'nullable|string|in:status,special,physical',
            'order_by' => 'nullable|in:name,power,pp,accuracy',
            'order_type' => 'nullable|in:asc,desc',
        ];
    }
}
