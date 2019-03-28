<?php
$con = new mysqli('localhost', 'root', '', "brave");
$con->set_charset('utf8');
if ($con->connect_errno){
	die('Нет соединения: ' . $con->connect_errno);
}
?>