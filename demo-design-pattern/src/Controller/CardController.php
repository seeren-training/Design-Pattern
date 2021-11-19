<?php

namespace App\Controller;

use App\Dao\CardDaoProxy;
use App\Factory\CardFactory;

class CardController
{

    public function showAll()
    {
        // Controller, valider, la donnée
        $cardDaoProxy = new CardDaoProxy();
        // Fournir le paramètre de couleur
        $cards = $cardDaoProxy->fetchCards();
        include __DIR__ . '/../../templates/card/show_all.html.php';
    }

    public function show($id)
    {
        echo $id;
    }

}