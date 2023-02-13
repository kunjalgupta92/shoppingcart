<?php

declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Mezzio\Hal\HalResponseFactory;
use Mezzio\Hal\ResourceGenerator;
use App\Handler\ShowProductHandler;

/**
 * Class ShowProductHandlerFactory
 * @package App\Factory
 */
class ShowProductHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return ShowProductHandler
     */
    public function __invoke(ContainerInterface $container) : ShowProductHandler
    {
        $entityManager = $container->get(EntityManager::class);
        $responseFactory   = $container->get(HalResponseFactory::class);
        $resourceGenerator   = $container->get(ResourceGenerator::class);

        return new ShowProductHandler($entityManager,$responseFactory,$resourceGenerator);
    }
}