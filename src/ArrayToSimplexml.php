<?php

namespace Wefabric\ArrayToSimplexml;

use SimpleXMLElement;

class ArrayToSimplexml
{

    /**
     * Recursive function to add all members of an array to the given XML element.
     * The opposite of Wefabric\simplexml-to-array.
     * @param SimpleXMLElement $object the root-tag of the object. Must be supplied.
     */
    static function convert(SimpleXMLElement $object, array $data, bool $stripNumericKeys = false)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if($stripNumericKeys && is_numeric(array_key_first($value))) {
                    //THIS array contains numeric childs. So we won't add THIS array, but the values inside it as direct children with THIS class' name.
                    foreach($value as $childKey => $childValue) {
                        if(gettype($childValue) == 'string') {
                            $object->addChild($key, htmlspecialchars($childValue)); // PARENT key and CHILD (string) value
                        } else {
                            $new_object = $object->addChild($key); // PARENT key
                            self::convert($new_object, $childValue, $stripNumericKeys); // and CHILD (array) value
                        }
                    }
                } else {
                    $new_object = $object->addChild($key);
                    self::convert($new_object, $value, $stripNumericKeys);
                }
            } else {
                $object->addChild($key, htmlspecialchars($value));
            }
        }
    }

}
