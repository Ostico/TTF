<?php
/**
 * Created by PhpStorm.
 * User: Domenico Lupinetti <ostico@gmail.com>
 * Date: 08/01/17
 * Time: 17:22
 */

namespace TTF\V1\Rpc\Mapping\Spec1;


class Map2 extends \TTF\V1\Rpc\Mapping\Base\Map2 {

    /**
     * @return float
     */
    public function R(){
//        2D + (D * E / 100)
        return 2 * $this->D + ( $this->D * $this->E / 100 );
    }

}