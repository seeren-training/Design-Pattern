<?php

namespace App\Builder;

use App\Model\CardInterface;

class MagicCardDetailBuilder extends MagicCardBuilder
{

    public function build(
        \stdClass $stdCard,
        CardInterface $card): CardInterface
    {
        parent::build($stdCard, $card);
        $card->setColors($stdCard->colors);
        $card->setmanaCost($stdCard->manaCost);
        $card->setType($stdCard->type);
        $card->setText($stdCard->text ?? "");
        return $card;
    }

}
