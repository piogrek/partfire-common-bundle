<?php

/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    16/03/17
 * Time:    21:12
 * Project: opus-symfony
 * File:    CSVService.php
 *
 **/

namespace PartFire\CommonBundle\Services\CSV;

use Doctrine\Common\Collections\ArrayCollection;

class CSVService
{

    public function getCSVDataAsStandardClass($csvFileArray) : array
    {
        $csv = array_map('str_getcsv', $csvFileArray);

        array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);
        return $csv;
    }

    private function getPropertyNameFromName($name)
    {
        $upperCaseFirst = ucfirst($name);
        $removeSpaces = preg_replace("/[^a-zA-Z0-9]+/", "", $upperCaseFirst);
        return $removeSpaces;
    }
}