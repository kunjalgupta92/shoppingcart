<?php

declare(strict_types=1);

namespace App;

use Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
            'doctrine'     => $this->getDoctrineEntities(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies(): array
    {
        return [
            'invokables' => [
                Handler\PingHandler::class => Handler\PingHandler::class,
            ],
            'factories'  => [
                Handler\HomePageHandler::class => Handler\HomePageHandlerFactory::class,                
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'app'    => ['templates/app'],
                'error'  => ['templates/error'],
                'layout' => ['templates/layout'],
            ],
        ];
    }



    public function getDoctrineEntities() : array
    {
        return [
            'driver' => [
                

                // defines an annotation driver with two paths, and names it `order_driver`
                'product_driver' => [
                    'class' => AnnotationDriver::class,
                    'cache' => 'array',
                    'paths' => [
                        __DIR__.'/Entity',
                    ],
                ],
    
                // default metadata driver, aggregates all other drivers into a single one.
                // Override `orm_default` only if you know what you're doing
                'orm_default' => [
                    'drivers' => [
                        // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                        //'class' => MappingDriverChain::class,
                        'App\Entity' => 'product_driver',
                    ],
                ],

                /*
                'orm_default' => [
                    'class' => Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                    'cache' => 'array',
                    'paths' => [
                        __DIR__ . '/../src/Entity',
                    ],
                ],
                */

                /*
                'orm_default' => [
                    'class' => MappingDriverChain::class,
                    'drivers' => [
                        'Album\Entity' => 'album_entity',
                    ],
                ],
                'album_entity' => [
                    'class' => AnnotationDriver::class,
                    'cache' => 'array',
                    'paths' => [__DIR__ . '/Entity'],
                ],
                */
            ],
        ];
    }

}
