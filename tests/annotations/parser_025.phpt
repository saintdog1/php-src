--TEST--
Annotation in function using properties test
--FILE--

<?php

<Annotation("value", "bar")>
function foo() {
}

echo 'OK!';

?>
--EXPECT--
OK!
