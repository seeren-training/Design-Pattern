<?php

namespace App\Controller;

use App\Model\Card;

class CardController
{

    public function showAll()
    {
        $content = file_get_contents('https://api.magicthegathering.io/v1/cards');
        $json = json_decode($content, true);
        $cards = [];
        foreach ($json['cards'] as $rawCards) {
            
            /**
             * Au lieu de créer la carte comme çi dessous
             * Je vous invite à mettre en palce le pattern AbstractFactory
             * Créer une nouvelle classe (l'usine)
             * Cette classe possède une méthode permetant de créer une nouvelle carte
             * Ne préciser pas les types de retour
             * Vous devez utiliser l'usine pour obtenir une nouvelle carte
             */
            // Récupérer une nouvelle instance de mon modèle "Card"
            $card = new Card();
            // Mettre la nouvelle instance dans le tableau
            $cards[] = $card;
        }
    }

    public function show($id)
    {

        echo $id;
    }

}