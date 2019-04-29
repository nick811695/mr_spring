<?php

session_start();
$errMsg="";

    try{
        $dsn="mysql:host=localhost;port=3306;dbname=test;charset=utf8";
        $user="root";
        $password="bebe";
        $options= array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
        $pdo = new PDO($dsn, $user, $password, $options);
        $sql="UPDATE card set cardStatus=0 where memNo = :memNo and cardNo = :cardNo" ;

        $memNo = $_REQUEST['memNo'];
        $cardNo = $_REQUEST['cardNo'];

        $artStatus = $pdo ->prepare($sql);
        $artStatus -> bindValue(":memNo",$memNo);
        $artStatus -> bindValue(":cardNo",$cardNo);
        $artStatus -> execute();

       
        
       
    }catch(PDOException $e){
            $errMsg = "錯誤原因" . $e -> getMessage() . "<br>" ;
            $errMsg .= "錯誤行號" . $e -> getLine() . "<br>" ;

    }

    ?>