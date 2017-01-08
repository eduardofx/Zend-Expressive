<?php
use App\Action\Product;

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\AuraRouter::class,
            App\Action\PingAction::class => App\Action\PingAction::class,
        ],
        'factories' => [
            App\Action\HomePageAction::class => App\Action\HomePageFactory::class,
            Product\ProductListPageAction::class => Product\Factory\ProductListPageFactory::class,
            Product\ProductCreatePageAction::class => Product\Factory\ProductCreatePageFactory::class,
            Product\ProductUpdatePageAction::class => Product\Factory\ProductUpdatePageFactory::class,
            Product\ProductDeleteAction::class => Product\Factory\ProductDeleteFactory::class
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => App\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'product.list',
            'path' => '/admin/products',
            'middleware' => Product\ProductListPageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'product.create',
            'path' => '/admin/product/create',
            'middleware' => Product\ProductCreatePageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'product.update',
            'path' => '/admin/product/{id}/update',
            'middleware' => Product\ProductUpdatePageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'product.delete',
            'path' => '/admin/product/{id}/delete',
            'middleware' => Product\ProductDeleteAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
