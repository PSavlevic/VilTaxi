<?php

namespace App\Feedbacks\Views;

class BaseForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'name' => [
                    'label' => 'Vardas',
                    'type' => 'text',
                ],
                'feedback' => [
                    'label' => 'Komentaras',
                    'type' => 'text',
                ],
                'date' => [
                    'type' => 'hidden',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                ],
            ]
        ];
    }
}
