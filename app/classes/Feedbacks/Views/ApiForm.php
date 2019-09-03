<?php

namespace App\Feedbacks\Views;

class ApiForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'name' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'feedback' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_text_length' => ['length' => 500],
                        ]
                    ]
                ],
                'date' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ]
        ];
    }

}
