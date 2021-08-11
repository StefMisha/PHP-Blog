<?php

namespace vendor\myVendor;

if (! function_exists('dd')) {

    function dd($value)
    {
        echo '<pre>';
        var_dump($value);
        die;
    }
}