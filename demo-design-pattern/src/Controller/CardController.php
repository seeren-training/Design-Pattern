<?php

namespace App\Controller;

class CardController
{

    public function showAll()
    {
        $content = file_get_contents('https://api.magicthegathering.io/v1/cards');
        $json = json_decode($content, true);
        $factory = new \App\Factory\CardFactory();
        $cards = [];
        foreach ($json['cards'] as $jsonCard) {
            array_push($cards, $factory->create());
        }
        var_dump($cards);
    }

    public function show($id)
    {
        echo $id;
    }

}