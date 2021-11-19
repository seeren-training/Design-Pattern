<?php

namespace App\Model;

class CardOption
{

    private ?string $color;

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): CardOption
    {
        $this->color = in_array($color, [
            'red',
            'green',
            'white',
            'black',
            'blue'
        ]) ? $color : null;
        return $this;
    }

}