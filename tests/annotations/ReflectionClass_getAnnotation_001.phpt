--TEST--
ReflectionClass::getAnnotation with simple annotation
--SKIPIF--
<?php extension_loaded('reflection') or die('skip'); ?>
--FILE--
<?php

class SimpleAnnotation implements ReflectionAnnotation {
}

<SimpleAnnotation>
class Foo {
}

$r = new ReflectionClass('Foo');
var_dump($r->getAnnotation('SimpleAnnotation'));

?>
--EXPECTF--
object(SimpleAnnotation)#2 (0) {
}
