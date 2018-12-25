<?php

return [
    /*
 |--------------------------------------------------------------------------
 | Laravel CORS
 |--------------------------------------------------------------------------
 |
 | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
 | to accept any value.
 |
 */
//    'supportsCredentials' => false,
//    'allowedOrigins' => ['*'],
//    'allowedHeaders' => ['Apigkey', 'Locale'],
//    'allowedMethods' => ['*'], // ex: ['GET', 'POST', 'PUT',  'DELETE']
//    'exposedHeaders' => [],
//    'maxAge' => 0,
//    ['url'=>"http://localhost:8081"],
//    ['url'=>"http://localhost:8082"],
//    ['url'=>"http://localhost:8083"],
//    ['url'=>"http://localhost:8080"],
    'defaults' => array(
        'supportsCredentials' => false,
        'allowedOrigins' => ['*'],
        'allowedHeaders' => ['Apigkey', 'Locale'],
        'allowedMethods' => ['*'], // ex: ['GET', 'POST', 'PUT',  'DELETE']
        'exposedHeaders' => [],
        'maxAge' => 0,
//        'hosts' => array()
    ),

    'paths' => array(
        'graphql*' => array(
            'supportsCredentials' => false,
            'allowedOrigins' => ['*'],
            'allowedHeaders' => ['Apigkey', 'Locale'],
            'allowedMethods' => ['*'], // ex: ['GET', 'POST', 'PUT',  'DELETE']
            'exposedHeaders' => [],
            'maxAge' => 3600,
//            'hosts' => array('graphql/guest')
        ),
    ),
];
