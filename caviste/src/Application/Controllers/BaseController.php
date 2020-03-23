<?php

namespace App\Application\Controllers;

use Psr\Container\ContainerInterface;

/**
 * Description of BaseController
 *
 * @author user
 */
class BaseController {
    protected $c;
    
    public function __construct(ContainerInterface $container) {
        
    }
}
