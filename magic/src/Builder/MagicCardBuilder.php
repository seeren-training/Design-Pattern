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
        $card->setImageUrl($stdCard->imageUrl ?? "");
        return $card;
    }

}
