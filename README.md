# array-to-simplexml

Tiny PHP 7.0+ package that converts an array to a SimpleXML object.

## Usage

```
$xml = new SimpleXMLElement('<Object xmlns:xs="http://www.w3.org/2001/XMLSchema" />');
ArrayToSimplexml::convert($xml, $data);
```

## Remarks

SimpleXML does not support empty elements. If you (might) have empty elements in your input-array, consider the package [wefabric\strip-empty-elements-from-array](https://github.com/wefabric/strip-empty-elements-from-array) to clean your input array.

If you instead are looking for a package that converts a SimpleXMl to an array, consider the package [wefabric\simplexml-to-array](https://github.com/wefabric/simplexml-to-array).