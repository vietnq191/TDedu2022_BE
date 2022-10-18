<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':Attribute must be accepted.',
    'accepted_if' => ':Attribute must be accepted when :other is :value.',
    'active_url' => ':Attribute is not a valid URL.',
    'after' => ':Attribute must be a date after :date.',
    'after_or_equal' => ':Attribute must be a date after or equal to :date.',
    'alpha' => ':Attribute must only contain letters.',
    'alpha_dash' => ':Attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => ':Attribute must only contain letters and numbers.',
    'array' => ':Attribute must be an array.',
    'before' => ':Attribute must be a date before :date.',
    'before_or_equal' => ':Attribute must be a date before or equal to :date.',
    'between' => [
        'array' => ':Attribute must have between :min and :max items.',
        'file' => ':Attribute must be between :min and :max kilobytes.',
        'numeric' => ':Attribute must be between :min and :max.',
        'string' => ':Attribute must be between :min and :max characters.',
    ],
    'boolean' => ':Attribute must be true or false.',
    'confirmed' => ':Attribute confirm does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => ':Attribute is not a valid date.',
    'date_equals' => ':Attribute must be a date equal to :date.',
    'date_format' => ':Attribute does not match the format :format.',
    'declined' => ':Attribute must be declined.',
    'declined_if' => ':Attribute must be declined when :other is :value.',
    'different' => ':Attribute and :other must be different.',
    'digits' => ':Attribute must be :digits digits.',
    'digits_between' => ':Attribute must be between :min and :max digits.',
    'dimensions' => ':Attribute has invalid image dimensions.',
    'distinct' => ':Attribute has a duplicate value.',
    'doesnt_end_with' => ':Attribute may not end with one of the following: :values.',
    'doesnt_start_with' => ':Attribute may not start with one of the following: :values.',
    'email' => ':Attribute must be a valid email address.',
    'ends_with' => ':Attribute must end with one of the following: :values.',
    'enum' => ':Attribute is invalid.',
    'exists' => ':Attribute is invalid.',
    'file' => ':Attribute must be a file.',
    'filled' => ':Attribute must have a value.',
    'gt' => [
        'array' => ':Attribute must have more than :value items.',
        'file' => ':Attribute must be greater than :value kilobytes.',
        'numeric' => ':Attribute must be greater than :value.',
        'string' => ':Attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => ':Attribute must have :value items or more.',
        'file' => ':Attribute must be greater than or equal to :value kilobytes.',
        'numeric' => ':Attribute must be greater than or equal to :value.',
        'string' => ':Attribute must be greater than or equal to :value characters.',
    ],
    'image' => ':Attribute must be an image.',
    'in' => ':Attribute is invalid.',
    'in_array' => ':Attribute does not exist in :other.',
    'integer' => ':Attribute must be an integer.',
    'ip' => ':Attribute must be a valid IP address.',
    'ipv4' => ':Attribute must be a valid IPv4 address.',
    'ipv6' => ':Attribute must be a valid IPv6 address.',
    'json' => ':Attribute must be a valid JSON string.',
    'lt' => [
        'array' => ':Attribute must have less than :value items.',
        'file' => ':Attribute must be less than :value kilobytes.',
        'numeric' => ':Attribute must be less than :value.',
        'string' => ':Attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => ':Attribute is not over :value items.',
        'file' => ':Attribute must be less than or equal to :value kilobytes.',
        'numeric' => ':Attribute must be less than or equal to :value.',
        'string' => ':Attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => ':Attribute must be a valid MAC address.',
    'max' => [
        'array' => ':Attribute is not over :max items.',
        'file' => ':Attribute is not over :max kilobytes.',
        'numeric' => ':Attribute is not over :max.',
        'string' => ':Attribute is not over :max characters.',
    ],
    'max_digits' => ':Attribute is not over :max digits.',
    'mimes' => ':Attribute must be a file of type: :values.',
    'mimetypes' => ':Attribute must be a file of type: :values.',
    'min' => [
        'array' => ':Attribute must have at least :min items.',
        'file' => ':Attribute must be at least :min kilobytes.',
        'numeric' => ':Attribute must be at least :min.',
        'string' => ':Attribute must be at least :min characters.',
    ],
    'min_digits' => ':Attribute must have at least :min digits.',
    'multiple_of' => ':Attribute must be a multiple of :value.',
    'not_in' => ':Attribute is invalid.',
    'not_regex' => ':Attribute format is invalid.',
    'numeric' => ':Attribute must be a number.',
    'password' => [
        'letters' => ':Attribute must contain at least one letter.',
        'mixed' => ':Attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => ':Attribute must contain at least one number.',
        'symbols' => ':Attribute must contain at least one symbol.',
        'uncompromised' => 'The given :Attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => ':Attribute must be present.',
    'prohibited' => ':Attribute is prohibited.',
    'prohibited_if' => ':Attribute is prohibited when :other is :value.',
    'prohibited_unless' => ':Attribute is prohibited unless :other is in :values.',
    'prohibits' => ':Attribute prohibits :other from being present.',
    'regex' => ':Attribute format is invalid.',
    'required' => ':Attribute is required.',
    'required_array_keys' => ':Attribute must contain entries for: :values.',
    'required_if' => ':Attribute is required when :other is :value.',
    'required_if_accepted' => ':Attribute is required when :other is accepted.',
    'required_unless' => ':Attribute is required unless :other is in :values.',
    'required_with' => ':Attribute is required when :values is present.',
    'required_with_all' => ':Attribute is required when :values are present.',
    'required_without' => ':Attribute is required when :values is not present.',
    'required_without_all' => ':Attribute is required when none of :values are present.',
    'same' => ':Attribute and :other must match.',
    'size' => [
        'array' => ':Attribute must contain :size items.',
        'file' => ':Attribute must be :size kilobytes.',
        'numeric' => ':Attribute must be :size.',
        'string' => ':Attribute must be :size characters.',
    ],
    'starts_with' => ':Attribute must start with one of the following: :values.',
    'string' => ':Attribute must be a string.',
    'timezone' => ':Attribute must be a valid timezone.',
    'unique' => ':Attribute is exists, Please select another.',
    'uploaded' => ':Attribute failed to upload.',
    'url' => ':Attribute must be a valid URL.',
    'uuid' => ':Attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
