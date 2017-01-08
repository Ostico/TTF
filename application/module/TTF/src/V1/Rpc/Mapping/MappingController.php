<?php
namespace TTF\V1\Rpc\Mapping;

use TTF\V1\Rpc\Mapping\Commons\MappingPhases;
use TTF\V1\Rpc\Mapping\Exceptions\ClassNotFoundException;
use Zend\Json\Json;
use Zend\Mvc\Controller\AbstractActionController;
use ZF\ApiProblem\ApiProblem;
use ZF\ApiProblem\ApiProblemResponse;
use ZF\ContentNegotiation\ViewModel;

class MappingController extends AbstractActionController
{

    /**
     * @return ApiProblemResponse|ViewModel
     */
    public function mappingAction()
    {

        try {

            $params = Json::decode( $this->getRequest()->getContent() );
            $mapper1 = $this->mapFactory( MappingPhases::PHASE1 );
            $mapper1->configure( $params );

            $mapper2 = $this->mapFactory( MappingPhases::PHASE2 );
            $mapper2->configure( $params );
            $mapper2->attach( $mapper1 );

            return new ViewModel([
                    'ack' => time(),
                    'X' => $mapper1->getValue(),
                    'Y' => $mapper2->getValue()
            ]);

        } catch ( \Exception $e ){
            return new ApiProblemResponse(
                    new ApiProblem( 400, $e->getMessage() )
            );
        }

    }

    protected function mapFactory( $phase ){
        $mapType = ucfirst( $this->params( 'mapType' ) );
        $class = '\\TTF\\V1\\Rpc\\Mapping\\' . $mapType . '\\Map' . $phase;
        if( class_exists( $class, true ) ){
            return new $class();
        }
        throw new ClassNotFoundException( "Method {$this->params( 'mapType' )} not found." );
    }

}
