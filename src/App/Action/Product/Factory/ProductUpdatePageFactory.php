<?php

namespace App\Action\Product\Factory;

use App\Action\Product\ProductUpdatePageAction;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ProductUpdatePageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        $router = $container->get(RouterInterface::class);
        $entityManager = $container->get(EntityManager::class);

        return new ProductUpdatePageAction($template, $router, $entityManager);
    }
}
