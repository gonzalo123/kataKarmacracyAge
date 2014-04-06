<?php

namespace G\Kcy;

class UserInfo
{
    private $userInfo;

    public function __construct($json)
    {
        $this->userInfo = json_decode($json, true)['data']['user'][0];
    }

    public function getDateSigned()
    {
        return $this->userInfo['date_signed'];
    }
}