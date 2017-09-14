<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    30/12/16
 * Time:    23:50
 * Project: PartFire MangoPay Bundle
 * File:    DateTimeService.php
 *
 **/

namespace PartFire\CommonBundle\Services\DateTime;


class DateTimeService
{
    private $timeAgo;

    public function __construct(TimeAgo $timeAgo)
    {
        $this->timeAgo = $timeAgo;
    }

    public function getNiceTime(\DateTime $dateTime)
    {
        return $dateTime->format('D jS \of F Y G:i:s');
    }

    public function getNiceTimeFileName(\DateTime $dateTime)
    {
        return $dateTime->format('D-j-F-Y--G-i-s');
    }

    public function getNiceTimeFileNameNow()
    {
        return $this->getNiceTimeFileName($this->getTimeNow());
    }


    public function getNiceDateNow()
    {
        return $this->getNiceDate($this->getTimeNow());
    }

    public function getNiceDateTimeNow()
    {
        return $this->getNiceTime($this->getTimeNow());
    }

    public function getNiceDate(\DateTime $dateTime)
    {
        return $dateTime->format('D, jS M, Y');
    }

    public function getShortDate(\DateTime $dateTime)
    {
        return $dateTime->format('d/m/Y');
    }

    public function getTimeNow() : \DateTime
    {
        return new \DateTime("now");
    }

    public function getTimeAgo(\DateTime $datetime, $future = false)
    {
        return $this->timeAgo->formatDiff(new \DateTime('now'), $datetime);
    }

    public function getAgeInYears(\DateTime $dateTime)
    {
        return $this->getTimeNow()->diff($dateTime)->y;
    }
}