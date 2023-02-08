<?php

declare(strict_types=1);

namespace App\Handler;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Helper\ServerUrlHelper;
use App\Handler\ShoppingCartHandler;
use Mezzio\Hal\HalResponseFactory;
use Mezzio\Hal\ResourceGenerator;
use Doctrine\ORM\EntityManager;

/**
 * Class ShoppingCartHandlerFactory
 * @package App\Handler
 */
class ShoppingCartHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return ShoppingCartHandler
     */
    public function __invoke(ContainerInterface $container) : ShoppingCartHandler
    {
        $entityManager = $container->get(EntityManager::class);
        $responseFactory   = $container->get(HalResponseFactory::class);
        $resourceGenerator   = $container->get(ResourceGenerator::class);

        return new ShoppingCartHandler($entityManager,$responseFactory,$resourceGenerator);
    }
}