<?php

namespace App\Controller;

use App\Services\CardService;

class CardController
{

    public function showAll (): void
    {
        $service = new CardService();
        $cards = $service->find();
        var_dump($cards);
    }

}
