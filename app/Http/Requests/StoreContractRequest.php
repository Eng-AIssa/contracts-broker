<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'terms_and_conditions' => ['accepted'],
            'entry_date' => ['required', 'date', 'after_or_equal:today'],
            'leaving_date' => ['required', 'date', 'after_or_equal:entry_date'],
            'unit_code' => ['required', 'string', 'max:255', 'exists:units,id'],
            'rental_fees' => ['numeric', 'between:1,100000'],
            'resident_name' => ['required', 'string', 'between:3,100'],
            'resident_id' => ['required', 'numeric', 'digits_between:10,11', 'starts_with:1,2'],
            'resident_email' => ['required', 'string', 'email', 'max:255'],
            'resident_nationality' => ['required', 'string', 'between:3,100']
        ];
    }
}
