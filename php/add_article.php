<?php 
	session_start();
	$now = date("Y-m-d");
	$article_title = $_REQUEST['article_title'];
	$article_text = $_REQUEST['article_text'];
	$cardNo = $_REQUEST['cardNo'];
	$memId = $_SESSION["memId"];
	$pdo = new PDO($dsn, $user, $password, $options); 
	$sql = "INSERT INTO 'article' ('artNo', 'artTitle', 'memNo', 'artText', 'artTime', 'cardNo') VALUES (NULL, :article_title, :memId, :article_text, :now, :cardNo);";
	$add_art = $pdo->prepare( $sql );
	$add_art->bindValue(":article_title", $_REQUEST['article_title']);
	$add_art->bindValue(":memId", $_SESSION["memId"]);
	$add_art->bindValue(":article_text", $_REQUEST['article_text']);
	$add_art->bindValue(":now", date("Y-m-d"));
	$add_art->bindValue(":cardNo", $_REQUEST['cardNo']);
 ?>