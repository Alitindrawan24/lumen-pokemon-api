<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;


class PokedexRequest extends FormRequest
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
            'type_1' => 'nullable|string',
            'type_2' => 'nullable|string',
            'order_by' => 'nullable|in:name,pokedex_number,attack,defense,special_attack,special_defense,speed,hp',
            'order_type' => 'nullable|in:asc,desc',
        ];
    }
}
