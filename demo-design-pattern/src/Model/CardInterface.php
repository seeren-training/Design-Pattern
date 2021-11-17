<?php

namespace App\Model;

interface CardInterface
{

    public function getName(): string;

    public function setName(string $name): CardInterface;

    public function getDescription(): ?string;

    public function setDescription(?string $description): CardInterface;

    public function getImage(): ?string;

    public function setImage(?string $image): CardInterface;

    public function getManaCost(): ?string;

    public function setManaCost(?string $manaCost): CardInterface;

    public function getColors(): ?array;

    public function setColors(?array $colors): CardInterface;

    public function getTypes(): ?array;

    public function setTypes(?array $types): CardInterface;

}