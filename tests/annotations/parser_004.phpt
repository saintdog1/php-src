--TEST--
Annotation in class using properties test
--FILE--

<?php

<Annotation("value", "bar")>
class Foo {
}

$foo = new Foo();

echo 'OK!';

?>
--EXPECT--
OK!
