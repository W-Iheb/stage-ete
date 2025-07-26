<?php

namespace App\Produit\Domain\Service;

use App\Entity\Produit;
use App\Produit\Domain\Repository\ProduitRepositoryInterface;

class CreateProduitInterractor
{
  private ProduitRepositoryInterface $repository;
  public function __construct(
      ProduitRepositoryInterface $repository
  ){
      $this->repository= $repository;
  }

  public function execute(string $title, string $description, float $price,\DateTimeInterface $expirationDate, int $categorieId )
  {
    $produit = new produit(null,$title,$description,$price,$expirationDate,$categorieId);
    $this->repository->save($produit);
  }
}