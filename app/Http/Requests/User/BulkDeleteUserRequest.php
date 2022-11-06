<?php

namespace App\Http\Requests\User;

use App\Rules\CheckRoleByUserID;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class BulkDeleteUserRequest extends FormRequest
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
            $array_roles = config('apiconst.SUPER_ADMIN.ALLOW_ROLES');
        }
        if (isLecturer()) {
            $array_roles = config('apiconst.LECTURER.ALLOW_ROLES');
        }
        
        return [
            'user_ids' => 'required|array',
            'user_ids.*' => [Rule::exists('users', 'id')->whereNull('deleted_at'), new CheckRoleByUserID($array_roles ?? [])],
        ];
    }

    public function getParam()
    {
        return request()->only('user_ids');
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}