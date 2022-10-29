<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required|string|min:8|max:255',
            'new_password' => 'required|string|min:8|max:255|confirmed',
        ];
    }

    public function getParam()
    {
        return request()->only('old_password', 'new_password');
    }

    protected function prepareForValidation()
    {
        $user = Auth::guard('api')->user();
        $idNotExist = 0;
        
        $this->merge([
            'id' => $user->id ?? $idNotExist,
        ]);
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
