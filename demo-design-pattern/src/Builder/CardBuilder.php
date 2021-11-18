<?php

namespace App\Builder;

use App\Model\CardInterface;

class CardBuilder
{

    public function build(
        CardInterface $card,
        array $jsonCard): void
    {
        $card
            ->setName($jsonCard['name'])
            ->setDescription($jsonCard['text'] ?? null)
            ->setManaCost($jsonCard['manaCost'] ?? null)
            ->setImage($jsonCard['imageUrl'] ?? null)
            ->setColors($jsonCard['colors'] ?? null)
            ->setTypes($jsonCard['types'] ?? null);
    }

}