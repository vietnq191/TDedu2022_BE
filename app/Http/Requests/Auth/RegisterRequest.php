<?php

namespace App\Http\Requests\Auth;

use App\Rules\Emails;
use App\Rules\WithoutSpaces;
use App\Rules\WithoutSpecialCharacters;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'email' => ['required', new Emails("", false), 'max:255', Rule::unique('users')->whereNull('deleted_at')],
            'username' => [
                'required', new WithoutSpaces(),
                new WithoutSpecialCharacters(), 'max:255', Rule::unique('users')->whereNull('deleted_at'),
            ],
            'full_name' => 'required|string|min:3|max:255',
            'mobile_phone' => [
                'required', 'numeric', 'digits_between:10,10',
                Rule::unique('user_profiles')->whereNull('deleted_at'),
            ],
            'gender' => 'required|in:M,F,U',
            'password' => 'required|string|min:8|max:255|confirmed',
        ];
    }

    public function getParam()
    {
        return request()->only('email', 'username', 'full_name', 'mobile_phone', 'gender', 'password');
    }

    public function messages()
    {
        return [
            'mobile_phone.numeric' => 'Phone must be numberic.',
            'mobile_phone.digits_between' => 'Phone is not 10 digits',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
