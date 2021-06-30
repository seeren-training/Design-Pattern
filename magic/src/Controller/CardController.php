<?php

namespace App\Controller;

use App\Controller\Trait\RenderTrait;
use App\Services\CardService;

class CardController
{

    use RenderTrait;

    public function showAll(): void
    {
        $this->render("card/show_all.html.php", [
            "cards" => (new CardService())->find()
        ]);
    }

}
