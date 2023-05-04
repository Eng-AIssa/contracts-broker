<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
        //dd($this->request);
        return [
            'unit_code' => ['required', 'string', 'between:3,100', 'unique:units,code'],
            'sector' => ['required', 'string', 'exists:users,id'],
            'owner' => ['required', 'string', 'exists:users,id'],
            'responsible' => ['required', 'string', 'exists:users,id'],
            'responsible_as' => ['required', 'string', 'between:3,100'],
        ];
    }
}
