<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class CheckRoleByUserID implements Rule
{
    protected $array_roles = [];
    protected $message = ':Attribute is not access to your role.';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($array_roles = [], $message = '')
    {
        $this->array_roles = $array_roles;
        if (strlen($message)) {
            $this->message = $message;
        }
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return User::find($value)?->hasAnyRole($this->array_roles);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
