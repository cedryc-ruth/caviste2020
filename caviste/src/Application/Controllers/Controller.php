<?php

namespace App\Application\Controllers;

use Psr\Container\ContainerInterface;

/**
 * Description of Controller
 *
 * @author user
 */
class Controller {
    protected $c;

    public function __construct(ContainerInterface $container)
    {
        $this->c = $container;
    }
}
