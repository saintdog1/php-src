--TEST--
Annotations on parameters
--FILE--

<?php

function foo(<Annotation("value")> $bar)
{
}

class foo {
	public function foo(<Annotations()> $bar)
	{
	}
}

echo 'OK!';

?>
--EXPECTF--
OK!
