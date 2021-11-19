<?php

namespace App\Dao;

use App\Builder\CardOptionBuilder;
use App\Factory\CardFactory;
use App\Model\CardOption;

class CardDao
{
    protected CardOption $cardOptions;

    public function __construct()
    {
        $this->cardOptions = new CardOption();
        (new CardOptionBuilder())->build(
            $this->cardOptions,
            filter_input_array(INPUT_GET) ?? []
        );
    }

    public function fetchCards(): array
    {
        $cards = [];
        $factory = new CardFactory();
        $content = file_get_contents(
            'https://api.magicthegathering.io/v1/cards?colors='
            . $this->cardOptions->getColor()
        );
        $json = json_decode($content, true);
        foreach ($json['cards'] as $jsonCard) {
            array_push($cards, $factory->create($jsonCard));
        }
        return $cards;
    }

}