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

class ListCartHandler implements RequestHandlerInterface
{
    protected $entityManager;
    protected $responseFactory;
    protected $resourceGenerator;

    public function __construct(EntityManager $entityManager,HalResponseFactory $responseFactory,ResourceGenerator $resourceGenerator) {
        $this->entityManager     = $entityManager;
        $this->responseFactory   = $responseFactory;
        $this->resourceGenerator = $resourceGenerator;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $repository = $this->entityManager->getRepository(Cart::class);
        
        // Note that this removes the call to setMaxResults()
        $query = 
            $this->entityManager
            ->getRepository(Cart::class)
            ->findAll();
           
        // Note that we pass the collection class the query result, and not the
        // query instance:
        print_r($query);exit;
        $collection = new CartCollection($query->getResult());
    
        $resource  = $this->resourceGenerator->fromObject($collection, $request);
        return $this->responseFactory->createResponse($request, $resource);
    }
}