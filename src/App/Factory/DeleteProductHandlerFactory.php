<?php

declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use App\Handler\DeleteProductHandler;

/**
 * Class DeleteProductHandlerFactory
 * @package App\Factory
 */
class DeleteProductHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return DeleteProductHandler
     */
    public function __invoke(ContainerInterface $container) : DeleteProductHandler
    {
        $entityManager = $container->get(EntityManager::class);

        return new DeleteProductHandler($entityManager);
    }
}