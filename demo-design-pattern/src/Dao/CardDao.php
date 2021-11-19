<?php

namespace App\Dao;

use App\Factory\CardFactory;

class CardDao
{

    // J'ajoute un paramètre pour récupérer la couleur
    public function fetchCards(): array
    {
        $cards = [];
        $factory = new CardFactory();
        // J'ajoute le paramètre à l'url de requete
        $content = file_get_contents('https://api.magicthegathering.io/v1/cards');
        $json = json_decode($content, true);
        foreach ($json['cards'] as $jsonCard) {
            array_push($cards, $factory->create($jsonCard));
        }
        return $cards;
    }

}