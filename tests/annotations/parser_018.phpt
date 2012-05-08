--TEST--
Annotation in method using properties test
--FILE--

<?php

class Foo {
    <Annotation("value", "bar")>
    public function bar() {
        echo 'do nothing';
    }
}

$foo = new Foo();

echo 'OK!';

?>
--EXPECT--
OK!
