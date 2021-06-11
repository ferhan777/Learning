<?php
$db = new MySqli('localhost','root','root','oophp');

if($db->connect_error){
	$error = $db->connect_error;
}

$db->set_charset('utf8');
