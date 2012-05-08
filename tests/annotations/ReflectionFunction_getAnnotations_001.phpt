--TEST--
ReflectionFunction::getAnnotations with simple annotation
--SKIPIF--
<?php extension_loaded('reflection') or die('skip'); ?>
--FILE--
<?php

class SimpleAnnotation implements ReflectionAnnotation {
}

<SimpleAnnotation>
function foo() {}

$r = new ReflectionFunction('Foo');
var_dump($r->getAnnotations());

?>
--EXPECTF--
array(1) {
  ["SimpleAnnotation"]=>
  object(SimpleAnnotation)#%d (0) {
  }
}
