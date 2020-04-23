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
        
        $vins = R::findAll('wine');
        
        return $view->render($response, 'Wine/index.html.twig',[
            'title' => $title,
            'vins' => $vins,
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
