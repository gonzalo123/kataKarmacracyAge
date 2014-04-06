<?php
use G\Kcy\UserInfo;

class UserInfoTest extends \PHPUnit_Framework_TestCase
{
    private $userInfo;

    public function setUp()
    {
        $json = '{"data":{"user":[{"username":"gonzalo123","kcyrank":"1345","img":"http:\/\/gravatar.com\/avatar\/6aa6fe484173856751a24135b4dd4586\/?s=85","level":"3","date_signed":"2011-12-03 15:55:27","stats":{"totalkcys":"252","totalkclicks":"4701.28","totalawards":"48","totalclips":"19","todaykcys":"0","todaykclicks":"0","humanscircle":"0","topwordscount":"0","topwords5":[],"koi":"0","connections":[{"connectid":"552444055","type":"FB","profile_url":"http:\/\/facebook.com\/profile.php?id=552444055","name":"Gonzalo Ayuso"},{"connectid":"fAR1tIhZYJ","type":"LI","profile_url":"http:\/\/www.linkedin.com\/in\/gonzaloayuso","name":"Gonzalo Ayuso"},{"connectid":"5303212","type":"TW","profile_url":"http:\/\/twitter.com\/gonzalo123","name":"gonzalo123"}]},"kcys":[]}]}}';
        $this->userInfo = new UserInfo($json);
    }

    public function test_userInfo_values()
    {
        $this->assertEquals('2011-12-03 15:55:27', $this->userInfo->getDateSigned());
    }
}