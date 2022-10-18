<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WithoutSpaces implements Rule
{
    protected $message = ':Attribute is not contain whitespace.';
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($message = '')
    {
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
        //
        return preg_match('/^\S*$/', $value);
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