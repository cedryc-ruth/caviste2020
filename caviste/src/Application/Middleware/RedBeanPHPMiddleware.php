<?php
declare(strict_types=1);

namespace App\Application\Middleware;

use Slim\Psr7\Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use RedBeanPHP\R;

/**
 * Description of RedBeanPHPMiddleware
 *
 * @author ceruth
 */
class RedBeanPHPMiddleware {
    
    public function __invoke(Request $request, RequestHandler $handler) {
        //AVANT
        //Se connecter au serveur de DB
        R::setup('mysql:host=localhost;dbname=cellar', 'root', 'root');
        
        $response = $handler->handle($request);
        
        //APRES
        //Se déconnecter du serveur de DB
        R::close();
            
        return $response;
    }
}

