<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=mrspring03;charset=utf8";
	$user = "mountain";
	$password = "6666";
	$options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION );
	$pdo = new PDO($dsn, $user, $password, $options);
?>
