<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncomeRequest extends FormRequest
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
            'income_title' => 'required|max:255',
            'income_category' => 'required',
            'description' => 'max:1000',
            'income_amount' => 'required|numeric',
        ];
    }
}
