<?php 

namespace App\Categorie\Domain\Service;

use App\Entity\Categorie;
use App\Categorie\Domain\Repository\CategorieRepositoryInterface;

class CreateCategorieInteractor
{
    private CategorieRepositoryInterface $repository;
    public function __construct(
         CategorieRepositoryInterface $repository
    ) {
        $this->repository= $repository;
    }

    public function execute(string $title, string $description)
    {
        $categorie = new Categorie(null,$title, $description);
        $this->repository->save($categorie);
        
    }
}