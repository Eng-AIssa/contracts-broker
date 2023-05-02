<?php

namespace App\Http\Requests;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOwnerRequest extends FormRequest
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
        $owner = $this->route('owner');

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($owner->user)],
            'phone' => ['required', 'string', 'size:10', "starts_with:05", Rule::unique('owners')->ignore($owner)],
            'id_number' => ['required', 'numeric', 'digits_between:10,11', 'starts_with:1,2', Rule::unique('owners')->ignore($owner)]
        ];
    }
}
