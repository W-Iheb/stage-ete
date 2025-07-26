<?php 


namespace App\Controller;

use App\Categorie\Application\Command\CreateCategorieCommand;
use App\Categorie\Application\Command\CreateCategorieHandler;
use Error;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{

private CreateCategorieHandler $handler;

    public function __construct(
        CreateCategorieHandler $handler
    ) {
        $this->handler = $handler;
    }

    #[Route('/categories', name: 'create_categorie', methods: ['POST'])]
    public function create(
        Request $request,
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);
        $command = new CreateCategorieCommand(
            $data['title'],
            $data['description']
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