--TEST--
Test CURLOPT_*SOCK
--SKIPIF--
<?php 
if (!extension_loaded("curl")) exit("skip curl extension not loaded");
if (!extension_loaded("sockets")) exit("skip sockets extension not loaded");
if (false === getenv('PHP_CURL_HTTP_REMOTE_SERVER'))  exit("skip PHP_CURL_HTTP_REMOTE_SERVER env variable is not defined");
?>
--FILE--
<?php
function opensocket($handler, $purpose, $address) {
	return socket_create($address['family'], $address['socktype'], $address['protocol']);
}

function sockopt($handler, $fd, $purpose) {

}

function closesocket($handler, $fd) {
	socket_close($fd);
}

  $host = getenv('PHP_CURL_HTTP_REMOTE_SERVER');

  $url = "{$host}/get.php?test=get";
  $ch = curl_init();

  ob_start(); // start output buffering
  curl_setopt($ch, CURLOPT_URL, $url); //set the url we want to use
  curl_setopt($ch, CURLOPT_SOCKOPTFUNCTION, 'sockopt');
  curl_setopt($ch, CURLOPT_OPENSOCKETFUNCTION, 'opensocket');
  curl_setopt($ch, CURLOPT_CLOSESOCKETFUNCTION, 'closesocket');

  
  $ok = curl_exec($ch);
  curl_close($ch);
  $curl_content = ob_get_contents();
  ob_end_clean();

  if($ok) {
    var_dump( $curl_content );
  } else {
    echo "curl_exec returned false";
  }
?>
===DONE===
--EXPECTF--
string(25) "Hello World!
Hello World!"
===DONE===
