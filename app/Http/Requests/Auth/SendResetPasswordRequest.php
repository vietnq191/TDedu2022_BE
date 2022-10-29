<?php

namespace App\Http\Requests\Auth;

use App\Rules\Emails;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SendResetPasswordRequest extends FormRequest
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
            'username' => ['required', new Emails("Username/Email is not format", true), 'max:255'],
        ];
    }

    public function getParam()
    {
        return request()->only('username');
    }

    public function messages()
    {
        return [
            'username.required' => 'Username/Email is required.',
            'username.max' => 'Username/Email is not over 255 characters.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
