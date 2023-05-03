<?php

namespace App\Http\Requests;

use App\Models\Sector;
use Illuminate\Foundation\Http\FormRequest;

class StoreSectorRequest extends FormRequest
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
            'sector_name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:10', 'unique:' . Sector::class],
            'registration_number' => ['required', 'string', 'max:255', 'unique:' . Sector::class],
            'contract_fees' => ['nullable', 'numeric', 'between:1,100000'],
            'manager_name' => ['required', 'string', 'max:255'],
            'manager_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'manager_phone' => ['required', 'string', 'size:10', 'starts_with:05', 'unique:sectors,manager_phone'],
            'manager_id' => ['required', 'numeric', 'digits_between:10,11', 'starts_with:1,2', 'unique:sectors,manager_id'],
        ];
    }
}
