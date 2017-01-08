<?php
/**
 * Created by PhpStorm.
 * User: Domenico Lupinetti <ostico@gmail.com>
 * Date: 08/01/17
 * Time: 17:09
 */

namespace TTF\V1\Rpc\Mapping;


use TTF\V1\Rpc\Mapping\Exceptions\ClassNotFoundException;

class MappingFactory {

    public static function get( $mapType, $phase ){
        $mapType = ucfirst( $mapType );
        $class = '\\TTF\\V1\\Rpc\\Mapping\\' . $mapType . '\\Map' . $phase;
        if( class_exists( $class, true ) ){
            return new $class();
        }
        throw new ClassNotFoundException( "Method {$mapType} not found." );
    }

}