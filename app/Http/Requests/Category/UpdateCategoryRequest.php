<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|in:income,expense',
            'essential' => 'required|boolean',
            'budget' => 'numeric',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, array<string, string>|string>
     */
    public function messages(): array
    {
        return [
            'name' => [
                'required' => 'O campo nome é obrigatório.',
                'string' => 'O campo nome deve ser uma string.',
            ],
            'description' => [
                'required' => 'O campo descrição é obrigatório.',
                'string' => 'O campo descrição deve ser uma string.',
            ],
            'type' => [
                'required' => 'O campo tipo é obrigatório.',
                'in' => 'O campo tipo deve ser income ou expense.',
            ],
            'essential' => [
                'required' => 'O campo essencial é obrigatório.',
                'boolean' => 'O campo essencial deve ser um booleano.',
            ],
            'budget.numeric' => 'O campo orçamento deve ser um número.',
        ];
    }
}
