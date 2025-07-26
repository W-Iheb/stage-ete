<?php
namespace App\Categorie\Infrastructure\Repository;
use App\Categorie\Domain\Repository\CategorieRepositoryInterface;
use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;

class CategoryRepository implements CategorieRepositoryInterface{
  public function __construct(
	  private EntityManagerInterface $entityManager,
  ){

  } 

	public function save(Categorie $category): void
	{
	  $this->entityManager->persist($category);
	  $this->entityManager->flush();
	}

	public function find(int $id): ?Categorie
	{
		return $this->entityManager->getRepository(Categorie::class)->find($id);
	}
}
