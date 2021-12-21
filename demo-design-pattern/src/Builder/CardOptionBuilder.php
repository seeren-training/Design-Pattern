<?php

namespace App\Builder;

use App\Model\CardOption;

class CardOptionBuilder
{

    public function build(
        CardOption $cardOption,
        array $options): void
    {
        $cardOption
            ->setColor($options['color'] ?? null)
            ->setPage((int) ($options['page'] ?? null));
    }

}