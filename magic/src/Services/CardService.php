<?php

namespace App\Services;

use App\Factory\MagicCardFactory;

class CardService
{

    public function find(): array
    {
        $cards = [];
        $factory = new MagicCardFactory();
        $content = file_get_contents("https://api.magicthegathering.io/v1/cards");
        $json = json_decode($content);
        foreach ($json->cards as $stdCard) {
            array_push($cards, $factory->create($stdCard));
        }
        return $cards;
    }

}
