--TEST--
Duplicated annotation
--FILE--

<?php

<Annotation("value", "bar")>
<Annotation("value", "bar")>
class foo() {
}

echo 'OK!';

?>
--EXPECTF--
Fatal error: Cannot redeclare annotation 'Annotation' in %s on line %d
