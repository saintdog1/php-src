--TEST--
Annotation in property using properties test
--FILE--

<?php

class Foo {
    <Annotation("value", "bar")>
    public $bar;
}

$foo = new Foo();

echo 'OK!';

?>
--EXPECT--
OK!
