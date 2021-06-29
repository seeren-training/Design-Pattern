<?php

namespace App\Factory;

use App\Builder\CardBuilderInterface;
use App\Builder\MagicCardBuilder;
use App\Builder\MagicCardDetailBuilder;
use App\Model\CardInterface;
use App\Model\MagicCard;
use App\Model\MagicCardDetail;

class MagicCardFactory
{

    const BASIC = 0;

    const DETAIL = 1;

    private CardBuilderInterface $builder;

    private CardBuilderInterface $builderDetail;

    private CardInterface $card;

    private CardInterface $cardDetail;

    public function __construct()
    {
        $this->builder = new MagicCardBuilder();
        $this->builderDetail = new MagicCardDetailBuilder();
        $this->card = new MagicCard();
        $this->cardDetail = new MagicCardDetail();
    }

    public function create(\stdClass $stdCard, int $type = self::BASIC): CardInterface
    {
        switch ($type) {
            case self::DETAIL:
                $card = clone $this->cardDetail;
                $this->builderDetail->build($stdCard, $card);
                break;
            case self::BASIC:
                $card = clone $this->card;
                $this->builder->build($stdCard, $card);
                break;
            default: throw new \InvalidArgumentException("Unknow option type: '$type'");
        }
        return $card;
    }

}
