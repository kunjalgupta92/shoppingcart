<?php

declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use App\Handler\CreateCartHandler;

/**
 * Class CreateCartHandlerFactory
 * @package App\Factory
 */
class CreateCartHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return CreateCartHandler
     */
    public function __invoke(ContainerInterface $container) : CreateCartHandler
    {
        $entityManager = $container->get(EntityManager::class);

        return new CreateCartHandler($entityManager);
    }
}