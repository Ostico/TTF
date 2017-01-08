<?php
return [
    'controllers' => [
        'factories' => [
            'TTF\\V1\\Rpc\\Mapping\\Controller' => \TTF\V1\Rpc\Mapping\MappingControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'ttf.rpc.mapping' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/mapping/:mapType',
                    'defaults' => [
                        'controller' => 'TTF\\V1\\Rpc\\Mapping\\Controller',
                        'action' => 'mapping',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'ttf.rpc.mapping',
        ],
    ],
    'zf-rpc' => [
        'TTF\\V1\\Rpc\\Mapping\\Controller' => [
            'service_name' => 'Mapping',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'ttf.rpc.mapping',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'TTF\\V1\\Rpc\\Mapping\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'TTF\\V1\\Rpc\\Mapping\\Controller' => [
                0 => 'application/vnd.ttf.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'TTF\\V1\\Rpc\\Mapping\\Controller' => [
                0 => 'application/vnd.ttf.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
];
