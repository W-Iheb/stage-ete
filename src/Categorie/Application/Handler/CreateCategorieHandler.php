<?php

namespace App\Categorie\Application\Command;

use App\Entity\Categorie;
use App\Categorie\Domain\Service\CreateCategorieInteractor;
class CreateCategorieHandler
{
    public function __construct(
        private CreateCategorieInteractor $interactor
    ) {}

    public function handle(CreateCategorieCommand $command): void
    {
        $this->interactor->execute($command->title, $command->description);
    }
}