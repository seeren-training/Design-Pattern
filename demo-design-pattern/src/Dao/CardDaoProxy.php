<?php

namespace App\Dao;

class CardDaoProxy extends CardDao
{

    // J'ajoute un paramètre pour récupérer la couleur
    public function fetchCards(): array
    {
        // J'ajoute le paramètre au nom du fichier
        $filename = __DIR__ . '/../../var/cache/cards.cache';
        if (file_exists($filename)) {
            $content = file_get_contents($filename);
            return unserialize($content);
        }
        // Fournir le paramètre de couleur
        $cards = parent::fetchCards();
        file_put_contents($filename, serialize($cards));
        return $cards;
    }

}