<?php 

namespace App\Produit\Application\Command;

class ModifyProduitCommand
{
  public function __construct(
      public readonly string $title,
      public readonly string $description,
      public readonly float $price,
      public readonly \DateTimeInterface $expirationDate,
      public readonly int $categorieId,
  ){}
}