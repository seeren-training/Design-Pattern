<?php

namespace App\Services;

class CardService extends AbstractCardService
{

    const RED = "red";

    const GREEN = "green";

    const BLUE = "blue";

    const WHITE = "white";

    const BLACK = "black";

    private array $options = [];

    public function __construct()
    {
        $color = filter_input(INPUT_GET, "color");
        if (self::RED === $color
            || self::GREEN === $color
            || self::BLUE === $color
            || self::WHITE === $color
            || self::BLACK === $color) {
            $this->options["colors"] = $color;
        }
    }

    protected function getOptions(): array
    {
        return $this->options;
    }

}
