<?php

namespace App\Application\Models;

use RedBeanPHP\SimpleModel;

/**
 * Description of Wine
 *
 * @author user
 */
class Wine extends SimpleModel {
    //Validations
    public function update() {
        if ( is_null($this->year) )
            throw new \Exception( 'Year is mandatory!' );
    }
}
