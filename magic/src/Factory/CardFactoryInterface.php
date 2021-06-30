<?php

namespace App\Factory;

use App\Model\CardInterface;

interface CardFactoryInterface
{

    const BASIC = 0;

    const DETAIL = 1;

    public function create(\stdClass $stdCard, int $type = self::BASIC): CardInterface;

}
