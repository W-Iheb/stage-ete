<?php

namespace App\Categorie\Domain\Repository;

use App\Entity\Categorie;

interface CategorieRepositoryInterface
{
    public function save(Categorie $categorie): void;
    public function find(int $id): ?Categorie;

}