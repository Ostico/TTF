<?php
/**
 * Created by PhpStorm.
 * User: Domenico Lupinetti <ostico@gmail.com>
 * Date: 08/01/17
 * Time: 03:12
 */

namespace TTF\V1\Rpc\Mapping\Commons;

use stdClass;

trait Configure {

    public function configure( stdClass $params ){
        foreach( $params as $key => $value ){
            $method = 'set' . ucfirst($key);
            if( method_exists( $this, $method ) ){
                $this->$method( $value );
            }
        }
    }

}