<?php

namespace markhuot\CraftQL\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\InterfaceType;
use GraphQL\Type\Definition\Type;

class Tag extends ObjectType {

    static $interface;
    static $baseFields;

    static function baseFields() {
        if (!empty(static::$baseFields)) {
            return static::$baseFields;
        }

        $fields = [];
        $fields['id'] = ['type' => Type::nonNull(Type::int())];
        $fields['title'] = ['type' => Type::nonNull(Type::string())];
        $fields['slug'] = ['type' => Type::string()];
        $fields['group'] = ['type' => \markhuot\CraftQL\Types\TagGroup::type()];

        return static::$baseFields = $fields;
    }

    static function interface() {
        if (!static::$interface) {
            $fields = static::baseFields();

            static::$interface = new InterfaceType([
                'name' => 'TagInterface',
                'description' => 'A tag in Craft',
                'fields' => $fields,
                'resolveType' => function ($category) {
                    return ucfirst($category->group->handle).'Tags';
                }
            ]);
        }

        return static::$interface;
    }

}