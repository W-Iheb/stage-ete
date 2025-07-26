<?php

namespace App\Controller;

use App\Produit\Application\Command\CreateProduitCommand;
use App\Produit\Application\Command\CreateProduitHandler;
use Error;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{

  private CreateProduitHandler $handler;

    public function __contruct(
      CreateProduitHandler $handler
    ) {
      $this->handler = $handler;
    }

    #[Route('/produit', name: 'create_produit', methods: ['POST'])]
    public function create(
      Request $request,
    ): JsonResponse {
      $data = json_decode($request->getContent(), true);

          $expirationDate = \DateTime::createFromFormat('d/m/Y', $data['expirationdate']);
    if (!$expirationDate) {
        return new JsonResponse(
            ['error' => 'Invalid date format. Expected DD/MM/YYYY'],
            Response::HTTP_BAD_REQUEST
        );
    }
      $command = new CreateProduitCommand(
        $data['title'],
        $data['description'],
        (float)$data['price'],
        $expirationDate,
        (int)$data['categorieId']
      );
      try{
        $this->handler->handle($command);
        return new JsonResponse([], Response::HTTP_CREATED);
      }
      catch (Error $e) {
        return new JsonResponse([], Response::HTTP_BAD_REQUEST);
      }
    }
}
