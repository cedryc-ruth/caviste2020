<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use RedBeanPHP\R;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use App\Application\Middleware\CorsMiddleware;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

return function (App $app) {    
    $app->get('/', function (Request $request, Response $response) {
        var_dump($request);
        $response->getBody()->write('Géniaaal!');
        return $response;
    });
    
    $app->get('/api/wines', function(Request $request, Response $response) {
        //Récupérer les données de la BD  
        try {        
            //Préparer la requête//Envoyer la requête//Extraire les données
            $result = R::findAll('wine', ' ORDER BY name');
            
            foreach($result as $bean) {
                $wines[] = $bean;
            }
        } catch(PDOException $e) {
            $wines = [
                [
                    "error" => "Problème de base données",
                    "errorCode" => $e->getCode(),
                    "errorMsg" => $e->getMessage(),
                ]
            ];
        }
        
        //Convertir les données en JSON
        $data = json_encode($wines);
        //var_dump($data);die;
        $response->getBody()->write($data);
        return $response
                ->withHeader('content-type', 'application/json')
                ->withHeader('charset', 'utf-8');
    });
    
    $app->get('/api/wines/{id}', function(Request $request, Response $response, array $args) {
        $id = $args['id'];
        
        //Se connecter au serveur de DB
        try {
            $result = R::load('wine', $id);
            
            $wines = [$result];
        } catch(PDOException $e) {
            $wines = [
                [
                    "error" => "Problème de base données",
                    "errorCode" => $e->getCode(),
                    "errorMsg" => $e->getMessage(),
                ]
            ];
        }
        
        //Convertir les données en JSON
        $data = json_encode($wines);
        
        $response->getBody()->write($data);
        return $response
                ->withHeader('content-type', 'application/json')
                ->withHeader('charset', 'utf-8');
    });
    
    $app->get('/api/wines/search/{keyword}', function(Request $request, Response $response, array $args) {
        $keyword = $args['keyword'];
        
        //Se connecter au serveur de DB
        try {
            $result = R::findAll('wine', 'name LIKE ?',["%$keyword%"]);
            
            $wines = [$result];
        } catch(PDOException $e) {
            $wines = [
                [
                    "error" => "Problème de base données",
                    "errorCode" => $e->getCode(),
                    "errorMsg" => $e->getMessage(),
                ]
            ];
        }
        
        //Convertir les données en JSON
        $data = json_encode($wines);
        
        $response->getBody()->write($data);
        return $response
                ->withHeader('content-type', 'application/json')
                ->withHeader('charset', 'utf-8');
    })->add(RedBeanPHPMiddleware::class);
    
    $app->post('/api/wines', function(Request $request, Response $response) {
        //Récupérer les données du formulaire
        $content = $request->getBody()->getContents();
        $wine = json_decode($content, true);
        
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('debug.log', Logger::WARNING));
        
        //$log->warning(implode('-',$wine)); die;
        //Se connecter au serveur de DB
        try {
            //Créer un nouveau vin (bean)
            $newWine = R::dispense('wine');
            
            //Modifier le vin
            $newWine->name = $wine['name'];
            $newWine->year = $wine['year'];
            $newWine->grapes = $wine['grapes'];
            $newWine->country = $wine['country'];
            $newWine->region = $wine['region'];
            $newWine->description = $wine['description'];
            $newWine->picture = substr(strrchr($wine['picture'],'/'),1);
            
            //Sauvegarder dans la DB le vin modifié
            $insertedId = R::store($newWine);

            if($insertedId) {
                $data = ['success'=>true, 'id'=>$insertedId];    
            } else {
                $data = ['success'=>false];
            }   
        } catch(PDOException $e) {
            $data = [
                [
                    "error" => "Problème de base données",
                    "errorCode" => $e->getCode(),
                    "errorMsg" => $e->getMessage(),
                ]
            ];
        }
        
        $data = json_encode($data);
        $response->getBody()->write($data);
            
        return $response
                ->withHeader('content-type', 'application/json')
                ->withHeader('charset', 'utf-8');
    })->add(new CorsMiddleware());
    
    $app->delete('/api/wines/{id}', function(Request $request, Response $response, array $args) {
        $id = $args['id'];
        
        //Se connecter au serveur de DB
        try {
            //Rechercher le vin dans la DB
            $selectedWine = R::load('wine', $id);
            
            if($selectedWine->id) {
                //Supprimer le vin de la DB
                R::trash($selectedWine);
                $data = ['success'=>true];
            } else {
                $data = ['success'=>false];
            }
        } catch(PDOException $e) {
            $data = [
                [
                    "error" => "Problème de base données",
                    "errorCode" => $e->getCode(),
                    "errorMsg" => $e->getMessage(),
                ]
            ];
        }
        
        $data = json_encode($data);
        $response->getBody()->write($data);
            
        return $response
                ->withHeader('content-type', 'application/json')
                ->withHeader('charset', 'utf-8');
    })->add(new CorsMiddleware());
    
    $app->put('/api/wines/{id}', function(Request $request, Response $response, array $args) {
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('debug.log', Logger::WARNING));
        
        $id = $args['id'];
        
        $content = $request->getBody()->getContents();
        $wine = json_decode($content, true);

        //file_put_contents('debug.log', implode('-',array_keys($wine)));
        //file_put_contents('debug.log', implode('-',$wine),FILE_APPEND);
        
        //Se connecter au serveur de DB
        try {
            //Rechercher dans la DB le vin par id
            $selectedWine = R::load('wine', $id);
            
            //Modifier le vin
            $selectedWine->name = $wine['name'];
            $selectedWine->year = $wine['year'];
            $selectedWine->grapes = $wine['grapes'];
            $selectedWine->country = $wine['country'];
            $selectedWine->region = $wine['region'];
            $selectedWine->description = $wine['description'];
            $selectedWine->picture = substr(strrchr($wine['picture'],'/'),1);
            
            //Sauvegarder dans la DB le vin modifié
            $updatedId = R::store($selectedWine);
            
            //$log->warning('LOG START');
            //$log->warning(implode('-',array_keys($wine)));
            
            if($updatedId === $id) {
                $data = ['success'=>true];    
            } else {
                $data = ['success'=>false];
            }
        } catch(PDOException $e) {
            $data = [
                [
                    "error" => "Problème de base données",
                    "errorCode" => $e->getCode(),
                    "errorMsg" => $e->getMessage(),
                ]
            ];
        }
        
        $data = json_encode($data);
        $response->getBody()->write($data);
            
        return $response
                ->withHeader('content-type', 'application/json')
                ->withHeader('charset', 'utf-8');
    })->add(new CorsMiddleware());
   
    $app->group('/users', function (Group $group) {
        $group->get('/', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
    
    $app->options('/{routes:.+}', function(Request $request, Response $response, array $args) {
        return $response;
    });

};

