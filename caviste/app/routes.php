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
        $wine = $request->getParsedBody();
        
        //Se connecter au serveur de DB
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=cellar','root','root', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
                                
            //Définir la requête
            $query = "INSERT INTO `wine`"
                    . "(`id`, `name`, `year`, `grapes`, `country`, `region`, "
                    . "`description`, `picture`) "
                    . "VALUES (null,:name,:year,:grapes,:country, :region, "
                    . ":description, :picture)";
        
            //Préparer la requête
            $stmt = $pdo->prepare($query);
            
            //Exécuter la requête préparée
            $result = $stmt->execute([
                ':name' => $wine['name'],
                ':year' => $wine['year'],
                ':grapes' => $wine['grapes'],
                ':country' => $wine['country'],
                ':region' => $wine['region'],
                ':description' => $wine['description'],
                ':picture' => $wine['picture'],
            ]);

            if($result) {
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
    });
    
    $app->delete('/api/wines/{id}', function(Request $request, Response $response, array $args) {
        $id = $args['id'];
        
        //Se connecter au serveur de DB
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=cellar','root','root', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
                                
            //Définir la requête
            $query = "DELETE FROM `wine` WHERE `id`=:id";
        
            //Préparer la requête
            $stmt = $pdo->prepare($query);
            
            //Exécuter la requête préparée
            $result = $stmt->execute([
                ':id' => $id,
            ]);

            if($result) {
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
    });
    
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
            $pdo = new PDO('mysql:host=localhost;dbname=cellar','root','root', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
                     
            //Définir la requête
            $query = "UPDATE `wine` SET `name`=:name, `year`=:year, "
                    . "`grapes`=:grapes, `country`=:country, `region`=:region, "
                    . "`description`=:description, `picture`=:picture "
                    . "WHERE `id`=:id";
        
            //Préparer la requête
            $stmt = $pdo->prepare($query);
            
            //Exécuter la requête préparée
            $result = $stmt->execute([
                ':id' => $id,
                ':name' => $wine['name'],
                ':year' => $wine['year'],
                ':grapes' => $wine['grapes'],
                ':country' => $wine['country'],
                ':region' => $wine['region'],
                ':description' => $wine['description'],
                ':picture' => $wine['picture'],
            ]);
            
            $log->warning('LOG START');
            $log->warning(implode('-',array_keys($wine)));
            
            if($result && $stmt->rowCount()!=0) {
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

