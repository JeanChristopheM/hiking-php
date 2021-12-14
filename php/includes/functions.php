<?php

function sanitizeString($string) {
    $string = filter_var(strip_tags($string), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
    return $string;
}
function sanitizeInt($int) {
    $int = filter_var($int, FILTER_VALIDATE_INT);
    return $int;
}
function sanitizeFloat($float) {
    if (str_contains($float, ',')) {
        $float = str_replace(',', '.', $float);
    }
    $float = filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    return $float;
}