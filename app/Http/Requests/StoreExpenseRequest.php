<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'account_id' => 'required',
            'expense_category' => 'required',
            'expense_title' => 'required|max:3000|string',
            'description' => 'required|max:500',
            'expense_amount' => 'required|numeric'
        ];
    }
}
