<?php

namespace App\Application\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use RedBeanPHP\R;

/**
 * Description of WineController
 *
 * @author user
 */
class WineController extends BaseController {
   public function index(Request $request, Response $response, array $args) {
       $container = $this->c;
       $view = $container->get('view');
       
       //Définir ou récupérer les données
        $title = 'Liste des vins';
        $data = "Bonjour avec Twig et ça marche!";
        
        $vin = R::load('wine',30);
        $vin->name = 'Bouteille';
        $vin->year = 2019;
        R::store($vin);         //OK car year n'est pas null
        
        $vin = R::load('wine',31);
        $vin->name = 'Bouteille';
        $vin->year = null;
        //R::store($vin);         //Echéc car year est null (voir Models/Wine)
        
        return $view->render($response, 'Wine/index.html.twig',[
            'title' => $title,
            'data' => $data,
            'vin' => $vin,
        ]);
   }
   
   public function show(Request $request, Response $response, array $args) {
       $view = $this->c->get('view');
       
       $id = $args['id'];
       
       $vin = R::load('wine', $id);
       
       return $view->render($response,'Wine/show.html.twig',[
           'vin' => $vin,
       ]);
   }
}
