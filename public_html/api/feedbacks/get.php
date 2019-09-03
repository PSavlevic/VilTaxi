<?php

require '../../../bootloader.php';

$response = new \Core\Api\Response();

$model = new App\Feedbacks\Model();

$conditions = $_POST ?? [];

$feedbacks = $model->get($conditions);
if ($feedbacks !== false) {
    foreach ($feedbacks as $person) {
        $response->addData($person->getData());
    }
} else {
    $response->addError('Could not pull data from database!');
}

$response->print();