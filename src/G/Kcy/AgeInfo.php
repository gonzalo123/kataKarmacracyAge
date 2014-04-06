<?php

namespace G\Kcy;

use G\Kcy;

class AgeInfo
{
    private $userInfo;
    private $now;

    public function __construct(UserInfo $userInfo)
    {
        $this->userInfo = $userInfo;
        $this->now = new \DateTime();
    }

    public function getAge()
    {
        $signedDate = \DateTime::createFromFormat('Y-m-d H:i:s', $this->userInfo->getDateSigned());

        return (int) $this->now->diff($signedDate)->format('%y');
    }
}