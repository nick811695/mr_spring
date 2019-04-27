<?php
$errMsg="";

try{
  require_once("mt_connect.php");
  $sql = "INSERT INTO `membercoupon` VALUE (null, :couponNo, :memNo, (select curdate()), 1)";
  
  $coupon = $pdo->prepare($sql);//下指令
  
  $coupon -> bindValue(":couponNo", $_REQUEST["couponNo"]);
  $coupon -> bindValue(":memNo",1); //session
  
  $coupon->execute();  
  
}catch(PDOException $e){
  $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
  $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
  echo $errMsg;
}

?>