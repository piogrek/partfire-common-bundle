<?php

namespace spec\PartFire\CommonBundle\Services\CSV;

use PartFire\CommonBundle\Services\CSV\CSVService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CSVServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PartFire\CommonBundle\Services\CSV\CSVService');
    }

    function it_should_get_data()
    {
        $csvService = new CSVService();

        $testFile = __DIR__ . "/../../../../../Tests/test.csv";
        $fileAsArray = file($testFile);
        $csv = $csvService->getCSVDataAsStandardClass($fileAsArray);

        var_dump($csv[0]["Employee Number"]);
        //->shouldBe(45454545);

    }
}
