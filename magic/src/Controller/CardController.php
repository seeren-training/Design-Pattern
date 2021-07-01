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
            $options["page"] = 1;
            header("Location: /?" . http_build_query($options));
            exit();
        }
        $this->render("card/show_all.html.php", [
            "cards" => $cards,
            "options" => $options,
        ]);
    }

}
