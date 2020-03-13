<?php
declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class CorsMiddleware {
    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $response = $handler->handle($request);
//        $existingContent = (string) $response->getBody();
//
//        $response = new Response();
//        $response->getBody()->write('BEFORE' . $existingContent .'AFTER');

        return $response->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }
}
