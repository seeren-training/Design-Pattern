<?php

namespace App\Dao;

class CardDaoProxy extends CardDao
{

    public function fetchCards(): array
    {
        $filename = __DIR__ . '/../../var/cache/cards.cache';
        if (file_exists($filename)) {
            $content = file_get_contents($filename);
            return unserialize($content);
        }
        $cards = parent::fetchCards();
        file_put_contents($filename, serialize($cards));
        return $cards;
    }

}