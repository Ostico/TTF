<?php
/**
 * Created by PhpStorm.
 * User: Domenico Lupinetti <ostico@gmail.com>
 * Date: 08/01/17
 * Time: 17:22
 */

namespace TTF\V1\Rpc\Mapping\Spec2;


class Map2 extends \TTF\V1\Rpc\Mapping\Base\Map2 {

    /**
     * @return float
     */
    public function S(){
//         F + D + (D * E / 100)
        return $this->F + $this->D + ( $this->D * $this->E / 100 );
    }

}