<?php

function helper1()
{
    return 'helper';
}

if (!function_exists('helper1')) {
    function helper1()
    {
        return 'helper';
    }
}
