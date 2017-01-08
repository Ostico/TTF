<?php
namespace TTF\V1\Rpc\Mapping;

class MappingControllerFactory
{
    public function __invoke($controllers)
    {
        return new MappingController();
    }
}
