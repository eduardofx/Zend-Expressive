<?php

namespace App\Action\Product\Factory;

use App\Action\Product\ProductDeleteAction;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class ProductDeleteFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $entityManager = $container->get(EntityManager::class);

        return new ProductDeleteAction($router, $entityManager);
    }
}
