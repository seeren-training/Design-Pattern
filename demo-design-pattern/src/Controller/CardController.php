<?php

namespace App\Controller;

use App\Dao\CardDaoProxy;
use App\Factory\CardFactory;

class CardController
{

    public function showAll()
    {
        $cardDaoProxy = new CardDaoProxy();
        $cards = $cardDaoProxy->fetchCards();
        include __DIR__ . '/../../templates/card/show_all.html.php';
    }

    public function show($id)
    {
        echo $id;
    }

}