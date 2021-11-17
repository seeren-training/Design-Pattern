<?php

namespace App\Factory;

use App\Model\CardInterface;

class CardFactory
{

    public function create(): CardInterface
    {
        return new \App\Model\Card();
    }

}