<?php

namespace App\Factory;

use App\Builder\CardBuilderInterface;
use App\Builder\MagicCardBuilder;
use App\Model\CardInterface;
use App\Model\MagicCard;

class MagicCardFactory
{

    private CardBuilderInterface $builder;

    public function __construct()
    {
        $this->builder = new MagicCardBuilder();
    }

    public function create(\stdClass $stdCard): CardInterface
    {
        $card = new MagicCard();
        $this->builder->build($stdCard, $card);
        return $card;
    }

}
