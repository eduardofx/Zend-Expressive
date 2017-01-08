<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DoctrineMiddleware
{


    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        require __DIR__ . '/../../../config/doctrine.php';
        return $next($request, $response);
    }
}
