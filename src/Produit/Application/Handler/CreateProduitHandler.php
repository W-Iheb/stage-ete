<?php

namespace App\Produit\Application\Command;


use App\Entity\Produit;
use App\Produit\Domain\Service\CreateProduitInterractor;
class CreateProduitHandler
{
  public function __construct(
    private CreateProduitInterractor $interractor
  ) {}

  public function handle(CreateProduitCommand $command):void
  {
    $this->interractor->execute($command->title, $command->description, $command->price, $command->expirationDate, $command->categorieId);
  }
}