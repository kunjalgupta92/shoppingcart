<?php

declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Mezzio\Hal\HalResponseFactory;
use Mezzio\Hal\ResourceGenerator;
use App\Handler\ShowCartHandler;

/**
 * Class ShowCartHandlerFactory
 * @package App\Factory
 */
class ShowCartHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return ShowCartHandler
     */
    public function __invoke(ContainerInterface $container) : ShowCartHandler
    {
        $entityManager = $container->get(EntityManager::class);
        $responseFactory   = $container->get(HalResponseFactory::class);
        $resourceGenerator   = $container->get(ResourceGenerator::class);

        return new ShowCartHandler($entityManager,$responseFactory,$resourceGenerator);
    }
}