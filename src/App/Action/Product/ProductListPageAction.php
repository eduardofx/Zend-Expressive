<?php

namespace App\Action\Product;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;

class ProductListPageAction
{
    private $template;
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(Template\TemplateRendererInterface $template, EntityManager $entityManager)
    {
        $this->template = $template;
        $this->entityManager = $entityManager;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $repository = $this->entityManager->getRepository(Product::class);
        $products = $repository->findAll();

        return new HtmlResponse($this->template->render('app::product/list', [
            'products' => $products
        ]));
    }
}
