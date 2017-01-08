<?php
namespace TTF\V1\Rpc\Mapping;

use TTF\V1\Rpc\Mapping\Commons\MappingPhase1;
use TTF\V1\Rpc\Mapping\Commons\MappingPhase2;
use TTF\V1\Rpc\Mapping\Commons\MappingPhases;
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

            /**
             * @var MappingPhase1 $mapper1
             */
            $mapper1 = MappingFactory::get( $this->params( 'mapType' ), MappingPhases::PHASE1 );
            $mapper1->configure( $params );

            /**
             * @var MappingPhase2 $mapper2
             */
            $mapper2 = MappingFactory::get( $this->params( 'mapType' ), MappingPhases::PHASE2 );
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

}
