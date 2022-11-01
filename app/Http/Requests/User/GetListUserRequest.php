<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class GetListUserRequest extends FormRequest
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
            'full_name' => 'sometimes|max:255',
            'email' => 'sometimes|max:255',
            'status' => 'sometimes|in:Active,Inactive,Banned',
            'role' => 'sometimes|in:Lecturer,Student',
            'created_from' => 'sometimes|date_format:Y-m-d',
            'created_to' => 'sometimes|date_format:Y-m-d|after_or_equal:created_from',
        ];
    }

    public function getParam()
    {
        return request()->only('full_name', 'email', 'status', 'role', 'created_from', 'created_to');
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
