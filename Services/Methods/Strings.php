<?php

/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    30/03/17
 * Time:    09:30
 * Project: opus-symfony
 * File:    Strings.php
 *
 **/

namespace PartFire\CommonBundle\Services\Methods;

class Strings
{
    public static function doesThisBeginWithThat(string $beginWith, string $heyStack) : bool
    {
        $needleLength = strlen($beginWith);
        return substr($heyStack, 0, $needleLength) === $beginWith;
    }

    public static function removeThisOffTheEndOfString(string $string, string $removeOffEndString)
    {
        return substr($string, 0, -strlen($removeOffEndString));
    }

    /**
     * Translates a camel case string into a string with
     * underscores (e.g. firstName -> first_name)
     *
     * @param string $str String in camel case format
     * @return string $str Translated into underscore format
     */
    public static function fromCamelCase($str)
    {
        $str[0] = strtolower($str[0]);
        $func = create_function('$c', 'return "_" . strtolower($c[1]);');
        return preg_replace_callback('/([A-Z])/', $func, $str);
    }
    /**
     * Translates a string with underscores
     * into camel case (e.g. first_name -> firstName)
     *
     * @param string $str String in underscore format
     * @param bool $capitalise_first_char If true, capitalise the first char in $str
     * @return string $str translated into camel caps
     */
    public static function toCamelCase($string, $capitalise_first_char = false)
    {
        $string = str_replace('-', ' ', $string);
        $string = str_replace('_', ' ', $string);
        $string = ucwords(strtolower($string));
        $string = str_replace(' ', '', $string);

        if($capitalise_first_char) {
            $string[0] = strtoupper($string[0]);
        } else {
            $string[0] = strtolower($string[0]);
        }
        return $string;
    }

    public function removeSpaces(string $string) : string
    {
        return preg_replace('/\s+/', '', $string);
    }
}