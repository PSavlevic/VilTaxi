<?php

namespace App\Users\Views;

class LoginForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'attr' => [
                'id' => 'login-form',
                'method' => 'POST',
            ],
            'fields' => [
                'email' => [
                    'label' => 'El.paštas',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                          'placeholder' => 'Iveskite el. paštą',
                        ],
                        'validators' => [
                            'validate_not_empty',
                            'validate_mail',
                            'only_mail_validator'
                        ]
                    ],
                ],
                'password' => [
                    'label' => 'Slaptažodis',
                    'type' => 'password',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Iveskite slaptažodį',
                        ],
                        'validators' => [
                            'validate_not_empty',
                            'only_password_validator'
                        ]
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Prisijungti',
                ],
            ],
            'validators' => [
                'validate_login'
            ],            
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }

}
