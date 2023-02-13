<?php

declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use App\Handler\CreateProductHandler;

/**
 * Class CreateProductHandlerFactory
 * @package App\Factory
 */
class CreateProductHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return CreateProductHandler
     */
    public function __invoke(ContainerInterface $container) : CreateProductHandler
    {
        $entityManager = $container->get(EntityManager::class);

        return new CreateProductHandler($entityManager);
    }
}