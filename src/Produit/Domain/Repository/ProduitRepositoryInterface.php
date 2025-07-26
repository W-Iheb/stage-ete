<?php

namespace App\Produit\Domain\Repository;

use App\Entity\Produit;

interface ProduitRepositoryInterface
{
    public function save(Produit $produit): void;
    public function findAll(): array;
}
