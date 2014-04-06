<?php

use G\Kcy\AgeInfo;

class AgeInfoTest extends \PHPUnit_Framework_TestCase
{
    private $now;

    public function test_get_age_3_years_old()
    {
        $this->now = '2014-12-03 15:55:27';
        $ageInfo = $this->get_facade_for_date('2011-12-03 15:55:27');
        $this->assertEquals(3, $ageInfo->getAge());
    }

    public function test_get_age_2_years_old()
    {
        $this->now = '2014-11-03 15:55:27';
        $ageInfo = $this->get_facade_for_date('2011-12-03 15:55:27');
        $this->assertEquals(2, $ageInfo->getAge());
    }

    public function test_get_age_0_years_old()
    {
        $this->now = '2014-11-03 15:55:27';
        $ageInfo = $this->get_facade_for_date('2014-11-03 15:55:27');
        $this->assertEquals(0, $ageInfo->getAge());
    }

    private function get_facade_for_date($date)
    {
        $facade = new AgeInfo($this->getUserInfoMockForSignedDate($date));
        $this->changePrivateProperty($facade, 'now', $this->now);

        return $facade;
    }

    private function changePrivateProperty($object, $name, $value)
    {
        $class    = new ReflectionClass ($object);
        $property = $class->getProperty($name);
        $property->setAccessible(true);
        $property->setValue($object, \DateTime::createFromFormat('Y-m-d H:i:s', $value));
    }

    private function getUserInfoMockForSignedDate($dateSigned)
    {
        $userInfo = $this->getMockBuilder('G\Kcy\UserInfo')->disableOriginalConstructor()->getMock();
        $userInfo->expects($this->any())->method('getDateSigned')->will($this->returnValue($dateSigned));

        return $userInfo;
    }
}