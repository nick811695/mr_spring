<?php
    ob_start();
    session_start();

    $errMsg="";

    // $_SESSION["memNo"] = 1;

    try {
        require_once("yt_connect.php");
        $sql = "select * from member where memNo = {$_SESSION["memNo"]}";
        $memberInfo = $pdo->query($sql);//下指令
    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }

    // echo $errMsg;  

    
    $memberInfoRow = $memberInfo->fetch(PDO::FETCH_ASSOC);
        
    echo json_encode($memberInfoRow);
?>