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
use Laminas\Http\Request;
use Laminas\Diactoros\Response\JsonResponse;

class CreateProductHandler implements RequestHandlerInterface
{
    /** @var EntityManager */
    protected $entityManager;

    /** @var HalResponseFactory */
    protected $responseFactory;

    /** @var ResourceGenerator */
    protected $resourceGenerator;

    public function __construct(
        EntityManager $entityManager,
    ) {
        $this->entityManager     = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $body = $request->getBody()->getContents();
        $data = json_decode($body, true);
        
        $productName = $data['name'];
        $productCode = $data['code'];
        $productPrice = $data['price'];
        
        $product = new Product();

        $product->setProductName($productName);
        $product->setProductCode($productCode);
        $product->setProductPrice($productPrice);
        $product->setCreated(new \DateTime());
        $product->setModified(new \DateTime());

        $this->entityManager->persist($product);
        $this->entityManager->flush();
        // $em->remove($books);

        $response = new JsonResponse([
            'status' => 'New product created',
            'data' => $data
        ]);
        return $response;
    }
}