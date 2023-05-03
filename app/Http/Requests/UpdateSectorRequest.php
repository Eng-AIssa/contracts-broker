<?php

namespace App\Http\Requests;

use App\Models\Sector;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSectorRequest extends FormRequest
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
        $sector = $this->route('sector');

        return [
            'sector_name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:10', Rule::unique('sectors')->ignore($sector)],
            'registration_number' => ['required', 'string', 'max:255', Rule::unique('sectors')->ignore($sector)],
            'contract_fees' => ['nullable', 'numeric', 'between:1,100000'],
            'manager_name' => ['required', 'string', 'max:255'],
            'manager_email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($sector->user)],
            'manager_phone' => ['required', 'string', 'size:10', 'starts_with:05', Rule::unique('sectors')->ignore($sector)],
            'manager_id' => ['required', 'numeric', 'digits_between:10,11', 'starts_with:1,2', Rule::unique('sectors')->ignore($sector)],
        ];
    }
}
