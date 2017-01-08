<?php
/**
 * Created by PhpStorm.
 * User: Domenico Lupinetti <ostico@gmail.com>
 * Date: 08/01/17
 * Time: 02:17
 */

namespace TTF\V1\Rpc\Mapping\Commons;

use ZF\ApiProblem\Exception\InvalidArgumentException;

/**
 * Class MappingLevel2
 * @package TTF\V1\Rpc\Mapping
 * @property $D int
 * @property $E int
 * @property $F int
 */
abstract class MappingPhase2 implements MapInterface {

    use Configure;

    protected $D;
    protected $E;
    protected $F;

    /**
     * @var MappingPhase1
     */
    protected $mapLevel1;

    /**
     * @return float
     */
    public function getValue(){
        switch ( $this->mapLevel1->getValue() ){
            case EnumType::R:
                return $this->R();
                break;
            case EnumType::S:
                return $this->S();
                break;
            case EnumType::T:
                return $this->T();
                break;
        }
    }

    /**
     * @param MappingPhase1 $mapLevel1
     */
    public function attach( MappingPhase1 $mapLevel1 ) {
        $this->mapLevel1 = $mapLevel1;
    }

    /**
     * @return float
     */
    abstract function R();

    /**
     * @return float
     */
    abstract function S();

    /**
     * @return float
     */
    abstract function T();

    /**
     * @param int $D
     */
    public function setD( $D ) {
        if( !is_int( $D ) ) throw new InvalidArgumentException( "Invalid value for field D." );
        $this->D = $D;
    }

    /**
     * @param int $E
     */
    public function setE( $E ) {
        if( !is_int( $E ) ) throw new InvalidArgumentException( "Invalid value for field E." );
        $this->E = $E;
    }

    /**
     * @param int $F
     */
    public function setF( $F ) {
        if( !is_int( $F ) ) throw new InvalidArgumentException( "Invalid value for field F." );
        $this->F = $F;
    }

}