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

    'accepted' => 'El :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es una URL válida.',
    'between' => [
        'numeric' => 'El :attribute debe estar entre :min y :max',
        'file' => 'El  :attributedebe estar entre :min y :max kilobytes',
        'string' => 'El :attribute debe estar entre los caracteres :min y :max.',
        'array' => 'El :attribute debe tener entre :min y :max.',
    ],
    'dimensions' => 'El :attribute tiene dimensiones de imagen no válidas',
    'email' => 'El :attribute debe ser una dirección de correo electrónico válida',
    'exists' => 'El :attribute seleccionado no es válido',
    'file' => 'El :attribute debe ser un archivo',
    'image' => 'El :attribute debe ser una imagen',
    'mimes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'unique' => 'El :attribute ya ha sido tomado.',
    'url' => 'el formato :attribute es invalido.',
    
    
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
