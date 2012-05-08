--TEST--
ReflectionClass::getAnnotation with complex annotations
--SKIPIF--
<?php extension_loaded('reflection') or die('skip'); ?>
--FILE--
<?php

class SimpleAnnotation1 implements ReflectionAnnotation {
	protected $value;

	public function __construct($value)
	{
		$this->value = $value;
	}
}
class SimpleAnnotation2 implements ReflectionAnnotation {
	public $foo;	
	protected $value;

	public function __construct($value = null, $foo = null)
	{
		$this->value = $value;
		$this->foo = $foo;
	}
}

<SimpleAnnotation1(array(
	<SimpleAnnotation2()>,
	<SimpleAnnotation2("test")>,
	<SimpleAnnotation2(null, "bar")>
))>
class Foo {
}

$r = new ReflectionClass('Foo');
var_dump($r->getAnnotation('SimpleAnnotation1'));

?>
--EXPECTF--
object(SimpleAnnotation1)#%d (1) {
  ["value":protected]=>
  array(3) {
    [0]=>
    object(SimpleAnnotation2)#%d (2) {
      ["foo"]=>
      NULL
      ["value":protected]=>
      NULL
    }
    [1]=>
    object(SimpleAnnotation2)#%d (2) {
      ["foo"]=>
      NULL
      ["value":protected]=>
      string(4) "test"
    }
    [2]=>
    object(SimpleAnnotation2)#%d (2) {
      ["foo"]=>
      string(3) "bar"
      ["value":protected]=>
      NULL
    }
  }
}
