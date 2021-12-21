<?php

namespace App\Model;

class CardOption
{

    private ?string $color;

    private ?int $page;

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): CardOption
    {
        $this->page = 0 >= $page ? 1 : $page;
        return $this;
    }

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