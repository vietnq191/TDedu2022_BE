<?php

namespace App\Http\Requests\Auth;

use App\Rules\WithoutSpaces;
use App\Rules\WithoutSpecialCharacters;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['required', Rule::exists('users', 'id')->whereNull('deleted_at')],
            'username' => [
                'required', new WithoutSpaces(),
                new WithoutSpecialCharacters(), 'max:255', Rule::unique('users')->whereNull('deleted_at')->ignore($this->id),
            ],
            'full_name' => 'required|string|min:3|max:255',
            'mobile_phone' => [
                'required', 'numeric', 'digits_between:10,10',
                Rule::unique('user_profiles')->whereNull('deleted_at')->ignore($this->id, 'user_id'),
            ],
            'date_of_birth' => 'required|date_format:Y-m-d|before:today',
            'gender' => 'required|in:M,F,U',
            'address' => 'sometimes',
        ];
    }

    public function getParam()
    {
        return request()->only('username', 'full_name', 'mobile_phone', 'date_of_birth', 'gender', 'address');
    }

    protected function prepareForValidation()
    {
        $user = Auth::guard('api')->user();
        $idNotExist = 0;
        
        $this->merge([
            'id' => $user->id ?? $idNotExist,
        ]);
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
