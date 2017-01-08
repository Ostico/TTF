<?php
/**
 * Created by PhpStorm.
 * User: Domenico Lupinetti <ostico@gmail.com>
 * Date: 08/01/17
 * Time: 17:22
 */

namespace TTF\V1\Rpc\Mapping\Spec2;


class Map1 extends \TTF\V1\Rpc\Mapping\Base\Map1 {

    public function checkSType() {
        if( $this->A && !$this->B && $this->C ) return true;
        return false;
    }

    public function checkTType() {
        if( $this->A && $this->B && !$this->C ) return true;
        return false;
    }

}