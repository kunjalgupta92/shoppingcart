<?php

declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;
use Mezzio\Hal\HalResponseFactory;
use Mezzio\Hal\ResourceGenerator;
use Doctrine\ORM\EntityManager;
use App\Handler\ListProductHandler;

/**
 * Class ListProductHandlerFactory
 * @package App\Factory
 */
class ListProductHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return ListProductHandler
     */
    public function __invoke(ContainerInterface $container) : ListProductHandler
    {
        $entityManager = $container->get(EntityManager::class);
        $responseFactory   = $container->get(HalResponseFactory::class);
        $resourceGenerator   = $container->get(ResourceGenerator::class);

        return new ListProductHandler($entityManager,$responseFactory,$resourceGenerator);
    }
}