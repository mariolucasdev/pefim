<?php

namespace App\Http\Requests\CreditCard;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreditCardRequest extends FormRequest
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
            'name'        => ['required', 'string'],
            'closing_day' => ['required', 'integer', 'min:1', 'max:31'],
            'due_day'     => ['required', 'integer', 'min:1', 'max:31'],
            'limit'       => ['required', 'numeric'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required'        => 'O campo nome é obrigatório.',
            'closing_day.required' => 'O campo dia de fechamento é obrigatório.',
            'closing_day.integer'  => 'O campo dia de fechamento deve ser um número inteiro.',
            'closing_day.min'      => 'O campo dia de fechamento deve ser no mínimo 1.',
            'closing_day.max'      => 'O campo dia de fechamento não pode ser maior que 31.',
            'due_day.required'     => 'O campo dia de vencimento é obrigatório.',
            'due_day.integer'      => 'O campo dia de vencimento deve ser um número inteiro.',
            'due_day.min'          => 'O campo dia de vencimento deve ser no mínimo 1.',
            'due_day.max'          => 'O campo dia de vencimento não pode ser maior que 31.',
            'limit.required'       => 'O campo limite é obrigatório.',
            'limit.numeric'        => 'O campo limite deve ser um número.',
        ];
    }
}
