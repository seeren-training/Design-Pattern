<?php

namespace App\Services;

use App\Factory\CardFactoryInterface;

class CardServiceCacheProxy extends CardService
{

    private CardService $service;

    public function __construct()
    {
        $this->service = new CardService();
    }

    public function find(int $type = CardFactoryInterface::BASIC): array
    {
        $filename = __DIR__ . "/../../var/cache/cards";
        if (is_file($filename)) {
            $content = file_get_contents($filename);
            return unserialize($content);
        }
        $cards = $this->service->find($type);
        file_put_contents($filename, serialize($cards));
        return $cards;
    }

}
