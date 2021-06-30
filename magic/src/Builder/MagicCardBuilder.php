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
        $card->setImageUrl(
            $stdCard->imageUrl
            ??
            "https://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=9999999&type=card"
        );
        return $card;
    }

}
