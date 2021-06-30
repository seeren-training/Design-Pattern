<?php

namespace App\Services;

use App\Factory\CardFactoryInterface;
use App\Factory\MagicCardFactory;

class CardService
{

    public function find(int $type = CardFactoryInterface::BASIC): array
    {
        $cards = [];
        $json = @json_decode(file_get_contents("https://api.magicthegathering.io/v1/cards"));
        if ($json) {
            foreach ($json->cards as $stdCard) {
                array_push($cards, (new MagicCardFactory())->create($stdCard, $type));
            }
        }
        return $cards;
    }

}
