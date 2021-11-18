<?php

namespace App\Factory;

use App\Builder\CardBuilder;
use App\Model\Card;
use App\Model\CardInterface;

class CardFactory
{

    private CardBuilder $builder;

    public function __construct()
    {
        $this->builder = new CardBuilder();
    }

    public function create(array $jsonCard): CardInterface
    {
        $card = new Card();
        $this->builder->build($card, $jsonCard);
        return $card;
    }

}