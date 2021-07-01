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
        $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
        if (self::RED === $color
            || self::GREEN === $color
            || self::BLUE === $color
            || self::WHITE === $color
            || self::BLACK === $color) {
            $this->options["colors"] = $color;
        }
        if (!$page) {
            $page = 1;
        }
        $this->options["page"] = $page;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

}
