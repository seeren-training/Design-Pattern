<?php

namespace App\Controller;

use App\Controller\Trait\RenderTrait;
use App\Services\CardServiceCacheProxy;

class CardController
{

    use RenderTrait;

    public function showAll(): void
    {
        $service = new CardServiceCacheProxy();
        $cards = $service->find();
        $options = $service->getOptions();
        if (!$cards) {
            header("Location: /?" . http_build_query([
                    "color" => $options["colors"] ?? null,
                    "page" =>  1
                ]));
            exit();
        }
        $this->render("card/show_all.html.php", [
            "cards" => $cards,
            "options" => $options,
        ]);
    }

    public function show(string $name,): void
    {
        echo $name;
    }

}
