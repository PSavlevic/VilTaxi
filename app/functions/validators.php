<?php

function validate_login($filtered_input, &$form) {
    $login_success = \App\App::$session->login(
            $filtered_input['email'],
            $filtered_input['password']
    );

    if (!$login_success) {
        $form['fields']['password']['error'] = 'Prisijungimo duomenys neteisingi!';
        $form['fields']['password']['value'] = '';
        return false;
    }

    return true;
}

function validate_user_email($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['email' => $field_value]);
    if ($users) {
        $field['error'] = 'Vartotojas tokiu el.paštu jau registruotas!';
        return false;
    }
    
    return true;
}

function only_mail_validator($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['email' => $field_value]);
    if (!$users) {
        $field['error'] = 'Vartotojas su tokiu el.paštu neužregistruotas!';
        return false;
    }

    return true;
}

function only_password_validator($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['password' => $field_value]);
    if (!$users) {
        $field['error'] = 'Slaptažodis neteisingas!';
        return false;
    }

    return true;
}

