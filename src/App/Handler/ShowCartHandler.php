<?php
declare(strict_types=1);

namespace App\Handler;

use App\Entity\Cart;
use App\Entity\CartCollection;
use Mezzio\Hal\HalResponseFactory;
use Mezzio\Hal\ResourceGenerator;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ShowCartHandler implements RequestHandlerInterface
{
    /** @var EntityManager */
    protected $entityManager;

    /** @var HalResponseFactory */
    protected $responseFactory;

    /** @var ResourceGenerator */
    protected $resourceGenerator;

    public function __construct(
        EntityManager $entityManager,
        HalResponseFactory $responseFactory,
        ResourceGenerator $resourceGenerator
    ) {
        $this->entityManager     = $entityManager;
        $this->responseFactory   = $responseFactory;
        $this->resourceGenerator = $resourceGenerator;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $entityRepository = $this->entityManager->getRepository(Cart::class);

        $Cart = $entityRepository->find($request->getAttribute('id'));

        $resource = $this->resourceGenerator->fromObject($Cart, $request);
        return $this->responseFactory->createResponse($request, $resource);
    }
}