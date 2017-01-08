<?php
/**
 * Created by PhpStorm.
 * User: Domenico Lupinetti <ostico@gmail.com>
 * Date: 08/01/17
 * Time: 01:16
 */

namespace TTF\V1\Rpc\Mapping\Base;

use TTF\V1\Rpc\Mapping\Commons\MappingPhase1;

/**
 * Class MappingBaseLevel1
 * @package TTF\V1\Rpc\MappingBase
 */
class Map1 extends MappingPhase1 {

    public function checkRType() {
        if( $this->A && $this->B && $this->C ) return true;
        return false;
    }

    public function checkSType() {
        if( $this->A && $this->B && !$this->C ) return true;
        return false;
    }

    public function checkTType() {
        if( !$this->A && $this->B && $this->C ) return true;
        return false;
    }

}