<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Emails implements Rule
{
    protected $message = ':Attribute is not in email format.';
    protected $isLogin = false;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($message = '', $isLogin = false)
    {
        $this->isLogin = $isLogin;
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
        if($this->isLogin) {
            if(!str_contains($value, '@')) {
                return true;
            }
        }
        return preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $value);
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
