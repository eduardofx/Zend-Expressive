<?php

namespace App\Action\Product;

use App\Entity\Product;
use App\Form\ProductForm;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;
use Zend\Hydrator\ClassMethods;

class ProductDeleteAction
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(
        RouterInterface $router,
        EntityManager $entityManager
    ) {
        $this->entityManager = $entityManager;
        $this->router = $router;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $repository = $this->entityManager->getRepository(Product::class);
        $product = $repository->find($request->getAttribute('id'));
        $this->entityManager->remove($product);
        $this->entityManager->flush();
        $uri = $this->router->generateUri('product.list');
        return new RedirectResponse($uri);
    }
}
