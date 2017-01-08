<?php
/**
 * Created by PhpStorm.
 * User: Domenico Lupinetti <ostico@gmail.com>
 * Date: 08/01/17
 * Time: 01:13
 */

namespace TTF\V1\Rpc\Mapping\Commons;

use TTF\V1\Rpc\Mapping\Exceptions\InvalidContextException;
use ZF\ApiProblem\Exception\InvalidArgumentException;

/**
 * Class MappingLevel1
 * @package TTF\V1\Rpc\MappingBase
 * @property $A boolean
 * @property $B boolean
 * @property $C boolean
 */
abstract class MappingPhase1 implements MapInterface {

    use MagicSet;

    protected $A;
    protected $B;
    protected $C;

    public function getValue(){
        if( $this->checkSType() ) return EnumType::S;
        elseif( $this->checkRType() ) return EnumType::R;
        elseif( $this->checkTType() ) return EnumType::T;
        else throw new InvalidContextException( "Provided context is not valid." );
    }

    abstract public function checkSType();
    abstract public function checkRType();
    abstract public function checkTType();

    /**
     * @param boolean $A
     */
    public function setA( $A ) {
        if( !is_bool( $A ) ) throw new InvalidArgumentException( "Invalid value for field A." );
        $this->A = $A;
    }

    /**
     * @param boolean $B
     */
    public function setB( $B ) {
        if( !is_bool( $B ) ) throw new InvalidArgumentException( "Invalid value for field B." );
        $this->B = $B;
    }

    /**
     * @param boolean $C
     */
    public function setC( $C ) {
        if( !is_bool( $C ) ) throw new InvalidArgumentException( "Invalid value for field C." );
        $this->C = $C;
    }

}