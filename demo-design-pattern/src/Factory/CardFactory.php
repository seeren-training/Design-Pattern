<?php

namespace App\Factory;

use App\Builder\CardBuilder;
use App\Model\Card;
use App\Model\CardInterface;

class CardFactory
{

    private CardBuilder $builder;

    private Card $card;

    public function __construct()
    {
        $this->builder = new CardBuilder();
        $this->card = new Card();
    }

    public function create(array $jsonCard): CardInterface
    {
        $card = clone $this->card;
        $this->builder->build($card, $jsonCard);
        return $card;
    }

}