<?php

namespace App\Http\Requests;

use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ConfirmContractRequest extends FormRequest
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
            'otp' => ['required', 'string', 'max:4'],
        ];
    }


    /**
     * Configure the validator instance.
     */
    public function withValidator(Validator $validator): void
    {
        if ($validator->passes()) {
            $validator-> after(function (Validator $validator) {
                if (!$this->contract->verifyOtp($this->otp)) {
                    $validator->errors()->add('fail', 'The provided OTP is incorrect');
                }
            });
        }
    }
}
