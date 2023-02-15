<?php

declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;
use Mezzio\Hal\HalResponseFactory;
use Mezzio\Hal\ResourceGenerator;
use Doctrine\ORM\EntityManager;
use App\Handler\ListCartHandler;

/**
 * Class ListCartHandlerFactory
 * @package App\Factory
 */
class ListCartHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return ListCartHandler
     */
    public function __invoke(ContainerInterface $container) : ListCartHandler
    {
        $entityManager = $container->get(EntityManager::class);
        $responseFactory   = $container->get(HalResponseFactory::class);
        $resourceGenerator   = $container->get(ResourceGenerator::class);

        return new ListCartHandler($entityManager,$responseFactory,$resourceGenerator);
    }
}