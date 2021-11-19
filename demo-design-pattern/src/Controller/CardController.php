<?php

namespace App\Controller;

use App\Dao\CardDaoProxy;
use App\Factory\CardFactory;

class CardController
{

    public function showAll(): void
    {
        $cards = (new CardDaoProxy())->fetchCards();
        include __DIR__ . '/../../templates/card/show_all.html.php';
    }

    public function show(string $name): void
    {
        echo $name;
    }

}