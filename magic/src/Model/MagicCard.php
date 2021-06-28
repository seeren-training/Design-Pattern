<?php

namespace App\Model;

class MagicCard implements CardInterface
{

    private string $name;

    private string $manaCoast;

    private array $colors;

    private string $type;

    private string $text;

    private string $imageUrl;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

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

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

}
