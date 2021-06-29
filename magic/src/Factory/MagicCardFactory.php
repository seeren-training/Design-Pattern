<?php

namespace App\Factory;

use App\Builder\CardBuilderInterface;
use App\Builder\MagicCardBuilder;
use App\Model\CardInterface;
use App\Model\MagicCard;

class MagicCardFactory
{

    private CardBuilderInterface $builder;

    private CardInterface $card;

    public function __construct()
    {
        $this->builder = new MagicCardBuilder();
        $this->card = new MagicCard();
    }

    public function create(\stdClass $stdCard): CardInterface
    {
        $card = clone $this->card;
        $this->builder->build($stdCard, $card);
        return $card;
    }

}
