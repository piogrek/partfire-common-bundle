<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    13/09/17
 * Time:    12:57
 * Project: opus-symfony
 * File:    Csv.php
 *
 **/

namespace PartFire\CommonBundle\Services\DataRenders;


class Csv implements DataRenderInterface
{
    CONST DELIMITER         = ',';
    CONST END_OF_LINE       = "\n";
    CONST VALUE_ENCLOSURE   = '"';

    public function getOutput(array $data)
    {
        return $this->getCSVOfData($data);
    }

    private function getCSVOfData(array $data) : string
    {
        $csv = '';
        $csv .= $this->getCSVHeader($data[0]);
        $csv .= $this->getCSVBody($data);
        return $csv;
    }

    private function getCSVBody(array $data) : string
    {
        $csv = '';
        $counter = 0;
        $length = count($data);
        foreach($data as $row) {
            $length = count($row);
            foreach($row as $name => $value) {
                $csv .= self::VALUE_ENCLOSURE . $value . self::VALUE_ENCLOSURE;
                $counter++;
                if ($counter < $length) {
                    $csv .= self::DELIMITER;
                } else {
                    $csv .= self::END_OF_LINE;
                    $counter = 0;
                }
            }
        }
        return $csv;
    }

    private function getCSVHeader(array $data) : string
    {
        $csv = '';
        $counter = 0;
        $length = count($data);
        foreach($data as $name => $value) {
            $csv .= self::VALUE_ENCLOSURE . $name . self::VALUE_ENCLOSURE;
            $counter++;
            $csv .= ($counter < $length) ? self::DELIMITER : self::END_OF_LINE;
        }
        return $csv;
    }

}