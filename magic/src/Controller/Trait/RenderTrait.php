<?php

namespace App\Controller\Trait;

trait RenderTrait
{

    public function render(string $template, array $data = []): void
    {
        $filename = __DIR__ . "/../../../templates/$template";
        if (!is_file($filename)) {
            throw new \InvalidArgumentException("Template not found: '$filename'");
        }
        extract($data);
        include $filename;
    }

}
