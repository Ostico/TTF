<?php
/**
 * Created by PhpStorm.
 * User: Domenico Lupinetti <ostico@gmail.com>
 * Date: 08/01/17
 * Time: 17:09
 */

namespace TTF\V1\Rpc\Mapping;


use TTF\V1\Rpc\Mapping\Commons\MapInterface;
use TTF\V1\Rpc\Mapping\Exceptions\ClassNotFoundException;

class MappingFactory {

    /**
     * @param $mapType
     * @param $phase
     *
     * @return MapInterface
     * @throws ClassNotFoundException
     */
    public static function get( $mapType, $phase ){
        $mapType = ucfirst( $mapType );
        $class = __NAMESPACE__ . '\\' . $mapType . '\\Map' . $phase;
        if( class_exists( $class, true ) ){
            return new $class();
        }
        throw new ClassNotFoundException( "Method {$mapType} not found." );
    }

}