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
}