<?php

namespace App\Http\Requests\BankAccount;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankAccountRequest extends FormRequest
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
            'name'                 => 'required|string',
            'bank_logo_id'         => 'required|exists:bank_logos,id',
            'initial_balance'      => 'required|numeric',
            'initial_balance_date' => 'required|date',
            'current_balance'      => 'required|numeric',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required'                 => 'O campo nome é obrigatório.',
            'name.string'                   => 'O campo nome deve ser uma string.',
            'bank_logo_id.required'         => 'O campo id do logotipo do banco é obrigatório.',
            'bank_logo_id.exists'           => 'O campo id do logotipo do banco deve existir na tabela de logotipos de banco.',
            'initial_balance.required'      => 'O campo saldo inicial é obrigatório.',
            'initial_balance.numeric'       => 'O campo saldo inicial deve ser um número.',
            'initial_balance_date.required' => 'O campo data de saldo inicial é obrigatório.',
            'initial_balance_date.date'     => 'O campo data de saldo inicial deve ser uma data.',
            'current_balance.required'      => 'O campo saldo atual é obrigatório.',
            'current_balance.numeric'       => 'O campo saldo atual deve ser um número.',
        ];
    }
}
