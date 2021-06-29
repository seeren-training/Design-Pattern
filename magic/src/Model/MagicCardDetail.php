<?php

namespace App\Model;

class MagicCardDetail extends MagicCard
{

    private string $manaCoast;

    private array $colors;

    private string $type;

    private string $text;

    public function getManaCoast(): string
    {
        return $this->manaCoast;
    }

    public function setManaCoast(string $manaCoast): void
    {
        $this->manaCoast = $manaCoast;
    }

    public function getColors(): array
    {
        return $this->colors;
    }

    public function setColors(array $colors): void
    {
        $this->colors = $colors;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

}
