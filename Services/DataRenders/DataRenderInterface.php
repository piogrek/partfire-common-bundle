<?php

/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    13/09/17
 * Time:    12:55
 * Project: opus-symfony
 * File:    DataRenderInterface.php
 *
 **/
namespace PartFire\CommonBundle\Services\DataRenders;

interface DataRenderInterface
{
    public function getOutput(array $data);
}