<?php

declare(strict_types=1);

namespace App;

use Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Laminas\Hydrator\ReflectionHydrator;
use Mezzio\Hal\Metadata\RouteBasedCollectionMetadata;
use Mezzio\Hal\Metadata\RouteBasedResourceMetadata;
use Mezzio\Hal\Metadata\MetadataMap;


/**
 * The configuration provider for the App module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
            'doctrine'     => $this->getDoctrineEntities(),
            MetadataMap::class => $this->getHalMetadataMap(),
        ];
    }

    public function getDependencies() : array
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
                Handler\CreateProductHandler::class => Factory\CreateProductHandlerFactory::class,
                Handler\ListProductHandler::class => Factory\ListProductHandlerFactory::class,
                Handler\ShowProductHandler::class => Factory\ShowProductHandlerFactory::class,
                Handler\UpdateProductHandler::class => Factory\UpdateProductHandlerFactory::class,
                Handler\DeleteProductHandler::class => Factory\DeleteProductHandlerFactory::class,
                Handler\CreateCartHandler::class => Factory\CreateCartHandlerFactory::class,
                Handler\ListCartHandler::class => Factory\ListCartHandlerFactory::class,
                Handler\ShowCartHandler::class => Factory\ShowCartHandlerFactory::class,
            ],
        ];
        
    }

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
                'cart_driver' => [
                    'class' => AnnotationDriver::class,
                    'cache' => 'array',
                    'paths' => [
                        __DIR__.'/Entity',
                    ],
                ],
                'orm_default' => [
                    // 'class' => MappingDriverChain::class,
                    'drivers' => [
                        'App\Entity' => 'product_driver',
                        'App\Entity' => 'cart_driver',
                    ],
                ],
                // 'product_entity' => [
                //     'class' => AnnotationDriver::class,
                //     'cache' => 'array',
                //     'paths' => [__DIR__ . '/Entity'],
                // ],
            ],
        ];
    }

    public function getHalMetadataMap()
    {
        return [
            [
                '__class__'      => RouteBasedResourceMetadata::class,
                'resource_class' => Entity\Product::class,
                'route'          => 'product.show', // assumes a route named 'albums.show' has been created
                'extractor'      => ReflectionHydrator::class,
            ],
            [
                '__class__'           => RouteBasedCollectionMetadata::class,
                'collection_class'    => Entity\ProductCollection::class,
                'collection_relation' => 'product',
                'route'               => 'products.list', // assumes a route named 'albums.list' has been created
            ],
            [
                '__class__'      => RouteBasedResourceMetadata::class,
                'resource_class' => Entity\Cart::class,
                'route'          => 'cart.show', // assumes a route named 'albums.show' has been created
                'extractor'      => ReflectionHydrator::class,
            ],
            [
                '__class__'           => RouteBasedCollectionMetadata::class,
                'collection_class'    => Entity\CartCollection::class,
                'collection_relation' => 'cart',
                'route'               => 'cart.list', // assumes a route named 'albums.list' has been created
            ],
        ];
    }

}
