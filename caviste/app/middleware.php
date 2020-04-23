<?php
declare(strict_types=1);

use App\Application\Middleware\SessionMiddleware;
use App\Application\Middleware\CorsMiddleware;
use App\Application\Middleware\RedBeanPHPMiddleware;
use Slim\App;
use Slim\Views\TwigMiddleware;

return function (App $app) {
    $app->add(SessionMiddleware::class);
    
    $app->add(RedBeanPHPMiddleware::class);
    
    // Add Twig-View Middleware
    $app->add(TwigMiddleware::createFromContainer($app));

    //$app->add(CorsMiddleware::class);
};
