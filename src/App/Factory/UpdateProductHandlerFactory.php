<?php

declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use App\Handler\UpdateProductHandler;

/**
 * Class UpdateProductHandlerFactory
 * @package App\Factory
 */
class UpdateProductHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return UpdateProductHandler
     */
    public function __invoke(ContainerInterface $container) : UpdateProductHandler
    {
        $entityManager = $container->get(EntityManager::class);

        return new UpdateProductHandler($entityManager);
    }
}