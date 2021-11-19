<?php

namespace App\Dao;

use App\Factory\CardFactory;

class CardDao
{

    public function fetchCards(): array
    {
        $cards = [];
        $factory = new CardFactory();
        $content = file_get_contents('https://api.magicthegathering.io/v1/cards');
        $json = json_decode($content, true);
        foreach ($json['cards'] as $jsonCard) {
            array_push($cards, $factory->create($jsonCard));
        }
        return $cards;
    }

}