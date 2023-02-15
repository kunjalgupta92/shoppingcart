<?php
declare(strict_types=1);

namespace App\Handler;

use App\Entity\Cart;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\CartCollection;
use Mezzio\Hal\HalResponseFactory;
use Mezzio\Hal\ResourceGenerator;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Http\Request;
use Laminas\Diactoros\Response\JsonResponse;

class CreateCartHandler implements RequestHandlerInterface
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
        
        $userRepository = $this->entityManager->getRepository(User::class);
        $productRepository = $this->entityManager->getRepository(Product::class);

        $user = $userRepository->find($data['user']);
        $product = $productRepository->find($data['product']);
        $quantity = $data['quantity'];
        
        $cart = new Cart();

        $cart->setUser($user);
        $cart->setProduct($product);
        $cart->setQuantity($quantity);

        $this->entityManager->persist($cart);
        $this->entityManager->flush();

        $response = new JsonResponse([
            'status' => 'New item added to cart',
            'data' => $data
        ]);
        return $response;
    }
}