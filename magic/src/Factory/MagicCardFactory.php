<?php

namespace App\Factory;

use App\Builder\CardBuilderInterface;
use App\Builder\MagicCardBuilder;
use App\Builder\MagicCardDetailBuilder;
use App\Model\CardInterface;
use App\Model\MagicCard;
use App\Model\MagicCardDetail;

class MagicCardFactory implements CardFactoryInterface
{

    private CardInterface $card;

    private CardInterface $cardDetail;

    private CardBuilderInterface $builder;

    private CardBuilderInterface $builderDetail;

    public function __construct()
    {
        $this->builder = new MagicCardBuilder();
        $this->builderDetail = new MagicCardDetailBuilder();
        $this->card = new MagicCard();
        $this->cardDetail = new MagicCardDetail();
    }

    public function create(\stdClass $stdCard, int $type = self::BASIC): CardInterface
    {
        return match ($type) {
            self::DETAIL => $this->builderDetail->build($stdCard, clone $this->cardDetail),
            self::BASIC => $this->builder->build($stdCard, clone $this->card),
            default => throw new \InvalidArgumentException("Unknown option type: '$type'"),
        };
    }

}
