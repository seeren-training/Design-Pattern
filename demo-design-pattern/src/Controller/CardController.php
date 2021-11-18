<?php

namespace App\Controller;

use App\Factory\CardFactory;

class CardController
{

    public function showAll()
    {
        $cards = [];
        $factory = new CardFactory();
        $content = file_get_contents('https://api.magicthegathering.io/v1/cards');
        $json = json_decode($content, true);
        foreach ($json['cards'] as $jsonCard) {
            array_push($cards, $factory->create($jsonCard));
        }
        include __DIR__ . '/../../templates/card/show_all.html.php';
    }

    public function show($id)
    {
        echo $id;
    }

}