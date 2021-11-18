<?php

namespace App\Controller;

use App\Factory\CardFactory;

class CardController
{

    public function showAll()
    {
        $content = file_get_contents('https://api.magicthegathering.io/v1/cards');
        $json = json_decode($content, true);
        $cards = [];
        $factory = new CardFactory();
        foreach ($json['cards'] as $jsonCard) {
            $card = $factory->create($jsonCard);
            array_push($cards, $card);
        }
        var_dump($cards);
    }

    public function show($id)
    {
        echo $id;
    }

}