--TEST--
Mysqli connect with user_prefix
--INI--
extension=mysqli.so
suhosin.sql.user_prefix=pre_
suhosin.log.stdout=32
--SKIPIF--
<?php
include('skipifmysqli.inc');
include('../skipif.inc');
?>
--FILE--
<?php
include('connect.inc');
$mysqli = new mysqli($host, 'invalid_username', $passwd, $db, $port, $socket);
?>
--EXPECTREGEX--
.*Access denied for user 'pre_invalid_username'.*