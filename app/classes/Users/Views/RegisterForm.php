<?php

namespace App\Users\Views;

class RegisterForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'attr' => [
                'id' => 'register-form',
                'method' => 'POST',
            ],
            'fields' => [
                'name' => [
                    'label' => 'Vardas*',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_text_length' => ['length' => 40],
                        ]
                    ],
                ],
                'surname' => [
                    'label' => 'Pavardė*',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_text_length' => ['length' => 40],
                        ]
                    ],
                ],
                'email' => [
                    'label' => 'El.paštas*',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_user_email',
                            'validate_mail',

                        ],
                    ],
                ],
                'password' => [
                    'label' => 'Slaptažodis*',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ],
                ],
                'password_repeat' => [
                    'label' => 'Pakartoti slaptažodį*',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ],
                ],
                'tel' => [
                    'label' => 'Telefonas',
                    'type' => 'number',
                    'extra' => [
                    ],
                ],
                'adress' => [
                    'label' => 'Namų adresas',
                    'type' => 'text',
                    'extra' => [
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Registruotis',
                ],
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }

}
