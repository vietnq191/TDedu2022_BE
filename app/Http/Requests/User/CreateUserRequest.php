<?php

namespace App\Http\Requests\User;

use App\Rules\Emails;
use App\Rules\WithoutSpaces;
use App\Rules\WithoutSpecialCharacters;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
        $role = '';
        if(isSuperAdmin()){
            $role = 'required|in:Lecturer,Student';
        }
        if(isLecturer()){
            $role = 'required|in:Student';
        }
        
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
            'date_of_birth' => 'required|date_format:Y-m-d|before:today',
            'gender' => 'required|in:M,F,U',
            'address' => 'sometimes',
            'role' => $role,
        ];
    }

    public function getParam()
    {
        return request()->only('email', 'username', 'full_name', 'mobile_phone', 'date_of_birth', 'gender', 'address', 'role');
    }

    public function messages()
    {
        return [
            'mobile_phone.numeric' => 'Phone must be numberic.',
            'mobile_phone.digits_between' => 'Phone is not 10 digits',
            'date_of_birth.date_format' => 'Date of Birth is not in date format',
            'date_of_birth.before' => 'Date of Birth is not be less than current date',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
