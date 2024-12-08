<?php

namespace App;

function is_arr_uc(array $array): bool
{
    foreach ($array as $element) {
        if (!is_string($element) || !preg_match('/^[A-Z]+$/', $element)) {
            return false;
        }
    }
    return true;
}
