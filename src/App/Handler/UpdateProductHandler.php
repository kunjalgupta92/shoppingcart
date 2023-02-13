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

class UpdateProductHandler implements RequestHandlerInterface
{
    /** @var EntityManager */
    protected $entityManager;

    public function __construct(
        EntityManager $entityManager,
    ) {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $entityRepository = $this->entityManager->getRepository(Product::class);

        $product = $entityRepository->find($request->getAttribute('id'));
        
        $body = $request->getBody()->getContents();
        $data = json_decode($body, true);
        
        $productName = $data['name'];
        $productCode = $data['code'];
        $productPrice = $data['price'];

        $product->setProductName($productName);
        $product->setProductCode($productCode);
        $product->setProductPrice($productPrice);
        $product->setModified(new \DateTime());

        $this->entityManager->persist($product);
        $this->entityManager->flush();
       
        $response = new JsonResponse([
            'status' => 'Product updated',
            'data' => $data
        ]);
        return $response;

    }
}