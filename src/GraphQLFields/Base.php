<?php

namespace markhuot\CraftQL\GraphQLFields;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Base {

    protected $description = 'Unknown description';
    protected $args = [];

    function __construct($request) {
        $this->request = $request;
    }

    function getType() {
        return Type::string();
    }

    function getDescription() {
        return $this->description;
    }

    function getArgs() {
        return $this->args;
    }

    // function getResolve($root, $args, $context, $info) {
    //     $reflect = new \ReflectionClass(static::class);
    //     $shortName = $reflect->getShortName();
    //     $fieldName = lcfirst($shortName);

    //     if (is_array($root)) {
    //         return $root[$fieldName];
    //     }

    //     if (is_object($root)) {
    //         return $root->{$fieldName};
    //     }

    //     return false;
    // }

    function toArray() {
        $definition =  [
            'type' => $this->getType(),
            'description' => $this->getDescription(),
            'args' => $this->getArgs(),
        ];

        if (method_exists($this, 'getResolve')) {
            $definition['resolve'] = [$this, 'getResolve'];
        }

        return $definition;
    }

}