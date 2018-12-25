<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 14/08/2018
 * Time: 08:28
 */

namespace App\Packages\Tools\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class ErrorType extends BaseType
{
    protected $attributes = [
        'name' => 'ErrorType',
        'description' => 'A ErrorType'
    ];

    public function fields()
    {
        return [
            'error' => [
                'type' => Type::boolean(),
                'description' => 'The title of ErrorType'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of ErrorType'
            ],
        ];
    }
}
