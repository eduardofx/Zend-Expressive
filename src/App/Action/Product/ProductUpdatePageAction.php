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

class ProductUpdatePageAction
{
    private $template;
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(
        Template\TemplateRendererInterface $template,
        RouterInterface $router,
        EntityManager $entityManager
    ) {
        $this->template = $template;
        $this->entityManager = $entityManager;
        $this->router = $router;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $repository = $this->entityManager->getRepository(Product::class);
        $product = $repository->find($request->getAttribute('id'));
        $form = new ProductForm();
        $form->setHydrator(new ClassMethods());
        $form->bind($product);
        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $form->setData($data);
            if ($form->isValid()) {
                $this->entityManager->flush();
                $uri = $this->router->generateUri('product.list');
                return new RedirectResponse($uri);
            }
        }
        return new HtmlResponse($this->template->render('app::product/update', [
            'form' => $form
        ]));
    }
}
