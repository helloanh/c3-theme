<?php

namespace CCC;

class App
{
	public static function get($key, $array)
    {
        $parsed = explode('.', $key);
        while ($parsed) {
            $next = array_shift($parsed);
            if (is_array($array) && array_key_exists($next, $array))
                $array = $array[$next];
            else
                return null;
        }
        return $array;
    }
}
