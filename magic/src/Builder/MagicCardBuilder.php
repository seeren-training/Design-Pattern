<?php

namespace App\Builder;

use App\Model\CardInterface;

class MagicCardBuilder implements CardBuilderInterface
{

    public function build(
        \stdClass $stdCard,
        CardInterface $card): CardInterface
    {
        $card->setName($stdCard->name);
        $card->setColors($stdCard->colors);
        $card->setManaCoast($stdCard->manaCost);
        $card->setType($stdCard->type);
        $card->setText($stdCard->text ?? "");
        $card->setImageUrl($stdCard->imageUrl ?? "");
        return $card;
    }
}
