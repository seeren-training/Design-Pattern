<?php

namespace App\Controller;

use App\Dao\CardDaoProxy;
use App\Factory\CardFactory;

class CardController
{

    public function showAll(): void
    {
        $cardDao = new CardDaoProxy();
        $cardOption = $cardDao->getCardOptions();
        $cards = $cardDao->fetchCards();
        if (!$cards) {
            header('Location: /?' . http_build_query([
                    'color' => $cardOption->getColor()
                ]));
            exit;
        }
        include __DIR__ . '/../../templates/card/show_all.html.php';
    }

    public function show(string $name): void
    {
        echo $name;
    }

}