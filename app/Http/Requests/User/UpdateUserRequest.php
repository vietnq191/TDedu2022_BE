<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Rules\CheckRoleByUserID;
use App\Rules\Emails;
use App\Rules\WithoutSpaces;
use App\Rules\WithoutSpecialCharacters;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        if (isSuperAdmin()) {
            $rule_role = config('apiconst.SUPER_ADMIN.VALIDATE_ROLE');
            $array_roles = config('apiconst.SUPER_ADMIN.ALLOW_ROLES');
        }
        if (isLecturer()) {
            $rule_role = config('apiconst.LECTURER.VALIDATE_ROLE');
            $array_roles = config('apiconst.LECTURER.ALLOW_ROLES');
        }

        return [
            'id' => [Rule::exists('users', 'id')->whereNull('deleted_at'), new CheckRoleByUserID($array_roles ?? [])],
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
            'role' => $rule_role ?? '',
            'status' => 'required|in:Active,Inactive,Banned'
        ];
    }

    public function getParam()
    {
        return request()->only('username', 'full_name', 'mobile_phone', 'date_of_birth', 'gender', 'address', 'role', 'status');
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->id,
        ]);
    }

    public function messages()
    {
        return [
            'mobile_phone.numeric' => 'Phone must be numberic.',
            'mobile_phone.digits_between' => 'Phone is not 10 digits',
            'mobile_phone.unique' => 'Phone is exists, Please select another.',
            'date_of_birth.date_format' => 'Date of Birth is not in date format',
            'date_of_birth.before' => 'Date of Birth is not be less than current date',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}