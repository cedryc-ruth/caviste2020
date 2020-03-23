<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Application\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use RedBeanPHP\R;

define( 'REDBEAN_MODEL_PREFIX', 'App\\Application\\Models\\' );
/**
 * Description of HomeController
 *
 * @author user
 */
class HomeController extends Controller {
    public function index($request, $response) {

        $vin = R::dispense('wine');
        $vin->name = 'ModelVin4';
        $vin->year = 2020;
        //R::store($vin);
        
        return $this->c->get('view')->render($response, 'catalogue.php',[
            'data' => $vin,
            'title' => 'titre',
        ]);
    }
    
    public function createSave($request, $response) {

        //Création et savegarde d'un nouveau vin
        $vin = R::dispense('wine');
        $vin->name = 'ModelVin4';
        $vin->year = 2020;
        R::store($vin);
        
        $vin = R::dispense('wine');
        $vin->name = 'ModelVin4';
        R::store($vin);      //Provoque une exception car pas de "year"
        
        return $this->c->get('view')->render($response, 'catalogue.php',[
            'data' => $vin,
            'title' => 'titre',
        ]);
    }
}
