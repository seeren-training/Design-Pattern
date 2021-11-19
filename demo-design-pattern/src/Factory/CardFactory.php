<?php

namespace App\Factory;

use App\Model\Card;
use App\Builder\CardBuilder;
use App\Model\CardInterface;

class CardFactory
{

    const DEFAULT = 0;

    const LIGHT = 1;

    const EXPANDED = 2;

    private CardBuilder $builder;

    private Card $card;

    public function __construct()
    {
        $this->builder = new CardBuilder();
        $this->card = new Card();
    }

    public function create(
        array $jsonCard,
        int $type = self::DEFAULT): CardInterface
    {
        if (self::DEFAULT !== $type) {
            throw new \InvalidArgumentException('Do not support other options');
        }
        $card = clone $this->card;
        $this->builder->build($card, $jsonCard);
        return $card;
    }

}