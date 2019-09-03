<?php


/**
 * fukcija tikrina, ar yra duombazeje useris. Jeigu yra, idedamas i sesija.
 * @param $filtered_input
 * @param $form
 * @return bool
 */
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

/**
 * funkcija tikrina, ar yra jau duombazeje useris su tokiu email'u
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_user_email($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['email' => $field_value]);
    if ($users) {
        $field['error'] = 'Vartotojas tokiu el.paštu jau registruotas!';
        return false;
    }
    
    return true;
}


/**
 * jeigu useris ives i logino forma email'a kurio nera DB, mes klaida
 * @param $field_value
 * @param $field
 * @return bool
 */
function only_mail_validator($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['email' => $field_value]);
    if (!$users) {
        $field['error'] = 'Vartotojas su tokiu el.paštu neužregistruotas!';
        return false;
    }

    return true;
}


/**
 * jeigu useris ives i logino forma neteisinga password'a, mes klaida.
 * @param $field_value
 * @param $field
 * @return bool
 */
function only_password_validator($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['password' => $field_value]);
    if (!$users) {
        $field['error'] = 'Slaptažodis neteisingas!';
        return false;
    }

    return true;
}

