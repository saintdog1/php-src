--TEST--
ReflectionClass::getAnnotations with constant value 
--SKIPIF--
<?php extension_loaded('reflection') or die('skip'); ?>
--FILE--
<?php

class SimpleAnnotation implements ReflectionAnnotation {
	protected $value;
	public function __construct($value) {
		$this->value = $value;
	}
}

<SimpleAnnotation(Foo::OK)>
class Foo {
	const OK = "OK!";
}

$r = new ReflectionClass('Foo');
var_dump($r->getAnnotations());

?>
--EXPECTF--
array(1) {
  ["SimpleAnnotation"]=>
  object(SimpleAnnotation)#%d (1) {
    ["value":protected]=>
    string(3) "OK!"
  }
}
