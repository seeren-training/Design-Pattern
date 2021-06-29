<?php

namespace App\Builder;

use App\Model\CardInterface;

interface CardBuilderInterface
{

    public function build(
        \stdClass $stdCard,
        CardInterface $card): CardInterface;

}