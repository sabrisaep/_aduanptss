<?php

if (!function_exists('tarikh')) {
    function tarikh($tarikh)
    {
        list($a, $b, $c) = explode('-', $tarikh);
        return "$c-$b-$a";
    }
}
