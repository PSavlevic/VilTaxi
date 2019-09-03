<?php

function validate_fields_match($filtered_input, &$form, $params) {
    $match = true;

    foreach ($params as $field_id) {
        $ref_value = $ref_value ?? $filtered_input[$field_id];
        if ($ref_value != $filtered_input[$field_id]) {
            $match = false;
            break;
        }
    }
    
    if (!$match) {
        $form['fields'][$field_id]['error'] = 'Laukai nesutampa!';
        return false;
    }

    return true;
}

function validate_not_empty($field_value, &$field) {
    if (strlen($field_value) == 0) {
        $field['error'] = 'Laukas negali būti tuščias';
    } else {
        return true;
    }
}

function validate_is_number($field_value, &$field) {
    if (!is_numeric($field_value)) {
        $field['error'] = 'Įveskite skaičių!';
    } else {
        return true;
    }
}

function validate_is_positive($field_value, &$field) {
    if ($field_value < 0) {
        $field['error'] = 'Įveskite teigiamą skaičių.';
    } else {
        return true;
    }
}

function validate_text_length($field_value, &$field, $params){
    if(strlen($field_value) >= $params['length']){
        $field['error'] = "Galite įrašyti ne daugiau {$params['length']}";
    } else {
        return true;
    }
}

function validate_mail($field_value, &$field) {
    $regex_email = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

    if (preg_match($regex_email, $field_value) == 0) {
        $field['error'] = 'Irašykite e-mailą tinkamu formatu';
    } else {
        return true;
    }
}