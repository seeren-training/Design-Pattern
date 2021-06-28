<?php

namespace App\Factory;

use App\Model\CardInterface;
use App\Model\MagicCard;

class MagicCardFactory
{

    public function create(\stdClass $stdCard): CardInterface
    {
        $card = new MagicCard();
        $card->setName($stdCard->name);
        $card->setColors($stdCard->colors);
        $card->setManaCoast($stdCard->manaCost);
        $card->setType($stdCard->type);
        $card->setText($stdCard->text ?? "");
        $card->setImageUrl($stdCard->iamgeUrl ?? "");
        return $card;
    }

}
