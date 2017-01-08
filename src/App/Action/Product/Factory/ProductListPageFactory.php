<?php

namespace App\Action\Product\Factory;

use App\Action\Product\ProductListPageAction;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ProductListPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        $entityManager = $container->get(EntityManager::class);

        return new ProductListPageAction($template, $entityManager);
    }
}
