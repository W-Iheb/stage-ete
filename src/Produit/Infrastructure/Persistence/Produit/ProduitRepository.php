<?php
namespace App\Produit\Infrastructure\Repository;
use App\Produit\Domain\Repository\ProduitRepositoryInterface;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;

class ProduitRepository implements ProduitRepositoryInterface{
  public function __construct(
    private EntityManagerInterface $entityManager,
  )
  {
    
  }

  public function save(Produit $produit): void
  {
    $this->entityManager->persist($produit);
    $this->entityManager->flush();
  }

  public function find(int $id): ?Produit
  {
    return $this->entityManager->getRepository(Produit::class)->find($id);
  }

  public function findAll(): array
  {
    return $this->entityManager->getRepository(Produit::class)->findAll();
  }
}