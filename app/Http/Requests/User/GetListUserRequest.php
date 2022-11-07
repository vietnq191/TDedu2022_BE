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
            'full_name' => 'nullable|max:255',
            'email' => 'nullable|max:255',
            'status' => 'nullable|in:Active,Inactive,Banned',
            'role' => 'nullable|in:Lecturer,Student',
            'created_from' => 'nullable|date_format:Y-m-d',
            'created_to' => 'nullable|date_format:Y-m-d|after_or_equal:created_from',
            'sort_name' => 'nullable|in:created_at,full_name',
            'sort_type' => 'nullable|in:asc,desc',
        ];
    }

    public function getParam()
    {
        return request()->only('full_name', 'email', 'status', 'role', 'created_from', 'created_to', 'sort_type', 'sort_name');
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
