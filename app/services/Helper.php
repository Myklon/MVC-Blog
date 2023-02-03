<?php

namespace app\services;

class Helper
{
    static function getUrlWithoutQueryString(): string
    {
        $url = $_SERVER['REQUEST_URI'] ?? "/";
        if( ($pos = strpos($url, '?')) !== false) $url = substr($url, 0, $pos);
        return $url;
    }
    static function cleanParametersArray($array)
    {
        return array_filter($array, function($k)
        {
            return !preg_match("/^\d+$/", $k);
        }, ARRAY_FILTER_USE_KEY);
    }
}