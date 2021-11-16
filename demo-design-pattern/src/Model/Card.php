<?php

namespace App\Model;

class Card
{

    private string $name;

    private ?string $description;

    private ?string $image;

    private ?string $manaCost;

    private ?array $colors;

    private ?array $types;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Card
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Card
    {
        $this->description = $description;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): Card
    {
        $this->image = $image;
        return $this;
    }

    public function getManaCost(): ?string
    {
        return $this->manaCost;
    }

    public function setManaCost(?string $manaCost): Card
    {
        $this->manaCost = $manaCost;
        return $this;
    }

    public function getColors(): ?array
    {
        return $this->colors;
    }

    public function setColors(?array $colors): Card
    {
        $this->colors = $colors;
        return $this;
    }

    public function getTypes(): ?array
    {
        return $this->types;
    }

    public function setTypes(?array $types): Card
    {
        $this->types = $types;
        return $this;
    }

}