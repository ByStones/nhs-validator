<?php

use ByStones\NHSNumber;

class NHSNumberTest extends \PHPUnit_Framework_TestCase {

    /**
    * @dataProvider numberProvider
    */
    public function testIsValid($expected, $number) {
        $nhsNumber = new NHSNumber($number);

        $this->assertEquals($expected, $nhsNumber->isValid());
    }

    public function numberProvider() {
        return array(
            //not numeric
            array(false, '123a567890'),
            //too short
            array(false, '123'),
            //checkbit wrong
            array(false, '3579645113'),
            //valid
            array(true, '9434765919'),
        );
    }

}
