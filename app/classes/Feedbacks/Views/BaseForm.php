<?php

namespace App\Feedbacks\Views;
date_default_timezone_set('europe/vilnius');

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
