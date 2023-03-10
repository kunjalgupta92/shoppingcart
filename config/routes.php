<?php

declare(strict_types=1);

use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Psr\Container\ContainerInterface;
/**
 * FastRoute route configuration
 *
 * @see https://github.com/nikic/FastRoute
 *
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/{id:\d+}', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/{id:\d+}', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/{id:\d+}', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Mezzio\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

// return static function (Application $app, MiddlewareFactory $factory, ContainerInterface $container): void {
//     $app->get('/', App\Handler\HomePageHandler::class, 'home');
//     $app->get('/api/ping', App\Handler\PingHandler::class, 'api.ping');
// };

return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    
    $app->post('/product', \App\Handler\CreateProductHandler::class, 'product.create');
    $app->get('/products', \App\Handler\ListProductHandler::class, 'products.list');
    $app->get('/product/:id', \App\Handler\ShowProductHandler::class, 'product.show');
    $app->put('/product/:id', \App\Handler\UpdateProductHandler::class, 'product.update');
    $app->delete('/product/:id', \App\Handler\DeleteProductHandler::class, 'product.delete');

    $app->post('/cart', \App\Handler\CreateCartHandler::class, 'cart.create');
    $app->get('/cart', \App\Handler\ListCartHandler::class, 'cart.list');
    $app->get('/cart/:id', \App\Handler\ShowCartHandler::class, 'cart.show');
};

