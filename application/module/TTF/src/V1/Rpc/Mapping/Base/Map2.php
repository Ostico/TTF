<?php
/**
 * Created by PhpStorm.
 * User: Domenico Lupinetti <ostico@gmail.com>
 * Date: 08/01/17
 * Time: 02:17
 */

namespace TTF\V1\Rpc\Mapping\Base;

use TTF\V1\Rpc\Mapping\Commons\MappingPhase2;

class Map2 extends MappingPhase2 {

    /**
     * @return float
     */
    public function R(){
//        D + (D * (E - F) / 100)
        return $this->D + ( $this->D * ( $this->E - $this->F ) / 100 );
    }

    /**
     * @return float
     */
    public function S(){
//        D + (D * E / 100)
        return $this->D + ( $this->D * $this->E / 100 );
    }

    /**
     * @return float
     */
    public function T(){
//        D - (D * F / 100)
        return $this->D - ( $this->D * $this->F / 100 );
    }

}