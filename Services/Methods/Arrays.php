<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    30/03/17
 * Time:    17:25
 * Project: opus-symfony
 * File:    Arrays.php
 *
 **/

namespace PartFire\CommonBundle\Services\Methods;


class Arrays
{
    public static function getArrayOfStringsFromMultiArray(array $data) : array
    {

    }

    public static function getSortedArrayWithObjects(array $arrayData, string $prop) : array
    {
        $data = array();

        foreach($arrayData as $item) {
            $methodName = 'get' . ucfirst($prop);

            $data[$item->$methodName()][] = $item;
        }

        //var_dump($data);
        krsort($data);

        $returnData = array();
        foreach ($data as $key => $item) {
            $returnData = array_merge($returnData, $item);
        }

        return $returnData;
    }

    public static function getUniquePropertiesList(array $arrayData, string $prop) : array
    {
        $data = array();
        $returnData = array();

        foreach($arrayData as $item) {
            $methodName = 'get' . ucfirst($prop);
            $propResult = $item->$methodName();


            if (!in_array($propResult, $returnData)) {
                $returnData[] = $propResult;
            }

        }
        rsort($returnData);
        return $returnData;
    }


}