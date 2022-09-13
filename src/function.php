<?php
if(!function_exists('config')){
    function config($key, $value = null): string{
        return "";
    }
}

if (! function_exists('app')) {
    function app($abstract = null, array $parameters = [])
    {
        return null;
    }
}