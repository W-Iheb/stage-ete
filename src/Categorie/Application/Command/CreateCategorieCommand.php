<?php

namespace App\Categorie\Application\Command;

class CreateCategorieCommand
{
    public function __construct(
        public readonly string $title,
        public readonly string $description
    ) {}
}