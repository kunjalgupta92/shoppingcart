<?php
declare(strict_types=1);

namespace App\Handler;

use App\Entity\Product;
use App\Entity\ProductCollection;
use Mezzio\Hal\HalResponseFactory;
use Mezzio\Hal\ResourceGenerator;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\JsonResponse;

class DeleteProductHandler implements RequestHandlerInterface
{
    /** @var EntityManager */
    protected $entityManager;

    public function __construct(
        EntityManager $entityManager,
    ) {
        $this->entityManager     = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $entityRepository = $this->entityManager->getRepository(Product::class);

        $product = $entityRepository->find($request->getAttribute('id'));

        $this->entityManager->remove($product);
        $this->entityManager->flush();  
        $response = new JsonResponse([
            'status' => 'ok',
            'message' => 'Product Deleted'
        ]);
        return $response;
    }
}