<?php

session_start();
$errMsg="";

    try{
        $dsn="mysql:host=localhost;port=3306;dbname=test;charset=utf8";
        $user="root";
        $password="bebe";
        $options= array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
        $pdo = new PDO($dsn, $user, $password, $options);
        $sql="UPDATE article set artStatus=0 where memNo = :memNo and artNo = :artNo";

        $memNo = $_REQUEST['memNo'];
        $artNo = $_REQUEST['artNo'];

        $artStatus = $pdo ->prepare($sql);
        $artStatus -> bindValue(":memNo",$memNo);
        $artStatus -> bindValue(":artNo",$artNo);
        $artStatus -> execute();

        // header("Location: member.php");

        
       
    }catch(PDOException $e){
            $errMsg = "錯誤原因" . $e -> getMessage() . "<br>" ;
            $errMsg .= "錯誤行號" . $e -> getLine() . "<br>" ;

    }