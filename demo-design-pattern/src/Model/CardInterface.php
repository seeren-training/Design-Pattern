<?php

namespace App\Model;

interface CardInterface
{

    public function getName(): string;

    public function setName(string $name): self;

    public function getDescription(): ?string;

    public function setDescription(?string $description): self;

    public function getImage(): ?string;

    public function setImage(?string $image): self;

    public function getManaCost(): ?string;

    public function setManaCost(?string $manaCost): self;

    public function getColors(): ?array;

    public function setColors(?array $colors): self;

    public function getTypes(): ?array;

    public function setTypes(?array $types): self;

}