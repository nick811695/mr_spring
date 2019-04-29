<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<script src="node_modules/gsap/src/minified/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/pixi.js/3.0.7/pixi.js"></script>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/share.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/mem.css">
<style>
body{
    background-image: url(images/backGround.jpg);
}
</style>
</head>
<body>

<?php
    $errMsg="";

    try{
        $dsn="mysql:host=localhost;port=3306;dbname=test;charset=utf8";
        $user="root";
        $password="bebe";
        $options= array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
        $pdo = new PDO($dsn, $user, $password, $options);
        $sql="select * from member where memNo= 1";// $_SESSION[""]
        $member=$pdo->query($sql);
        $memRow = $member -> fetch(PDO::FETCH_ASSOC);
        $memNo = $memRow['memNo'];
        $memImgUrl = $memRow['memImgUrl'];
        $memFirstName = $memRow['memFirstName'];
        $memLastName = $memRow['memLastName'];
        $memNickname = $memRow['memNickname'];
        $memId = $memRow['memId'];
        $memPsw = $memRow['memPsw'];
        $twId = $memRow['twId'];
        $memTel = $memRow['memTel'];
        $memEmail = $memRow['memEmail'];
        $_SESSION ['memNo']=1;


        //////////////////////我的訂單//////////////////////////
        $sql="SELECT * FROM orders as a JOIN card as b ON a.cardNo=b.cardNo LEFT JOIN coupon as c USING (couponNo) JOIN branch as d ON a.branchNo=d.branchNo where a.memNo=".$_SESSION ['memNo']."";// $_SESSION[""]
        $order=$pdo->query($sql);



        //////////////////////我的湯牌//////////////////////////

        $sql="SELECT * from card natural join ( select cardNo,itemName item1Name,itemImg2Url item1Img from carditem1 left outer join item on carditem1.item1No=item.itemNo ) as item1 natural join ( select cardNo,itemName item2Name,itemImg2Url item2Img from carditem2 left outer join item on carditem2.item2No=item.itemNo ) as item2 natural join ( select cardNo,itemName item3Name,itemImg2Url item3Img from carditem3 left outer join item on carditem3.item3No=item.itemNo ) as item3 natural join ( select cardNo,itemName item4Name,itemImg2Url item4Img from carditem4 left outer join item on carditem4.item4No=item.itemNo ) as item4 where memNo=".$_SESSION ['memNo']." and artNo is null and cardStatus=1";

        $card = $pdo ->query($sql);


        //////////////////////我的收藏//////////////////////////
        
        $sql="SELECT * from card natural join ( select cardNo,itemName item1Name,itemImg2Url item1Img from carditem1 left outer join item on carditem1.item1No=item.itemNo ) as item1 natural join ( select cardNo,itemName item2Name,itemImg2Url item2Img from carditem2 left outer join item on carditem2.item2No=item.itemNo ) as item2 natural join ( select cardNo,itemName item3Name,itemImg2Url item3Img from carditem3 left outer join item on carditem3.item3No=item.itemNo ) as item3 natural join ( select cardNo,itemName item4Name,itemImg2Url item4Img from carditem4 left outer join item on carditem4.item4No=item.itemNo ) as item4 where memNo=".$_SESSION ['memNo']." and artNo is not null and cardStatus = 1";

        $collection = $pdo ->query($sql);

        
        //////////////////////我的發表//////////////////////////
        $sql="SELECT * FROM article as a JOIN card as c ON a.cardNo = c.cardNo where a.memNo=".$_SESSION['memNo']." and artStatus =".$_SESSION['memNo']." ORDER BY artTime desc";
        $post = $pdo ->query($sql);


        //////////////////////我的酷碰//////////////////////////
        $sql2="SELECT * FROM membercoupon as m JOIN coupon as c ON m.couponNo = c.CouponNo where m.memNo = ".$_SESSION ['memNo']." ORDER BY memCouponDate";
        $coupon = $pdo ->query($sql2);


    }catch(PDOException $e){
        $errMsg.="錯誤原因".$e->getMessage()."<br>";
        $errMsg.="錯誤行號".$e->getLine()."<br>";
    }

    echo $errMsg; 
    ?>



 
<section class="wrap">
   <form action="updateMemberInfo.php" enctype="multipart/form-data"  method="post" >
        <div class="member_info">
    
        <!---------------------------------- 會員大頭貼 ------------------------------------->
        <div class="member_pic">
            <div class="member_imgPreview">
                <img id="imgPreview_pic" src="images/mem_photo/<?php echo $memImgUrl ?>" alt="上傳檔案">
            </div>
            <label class="member_edit_label">
                    <input type="file" name="memUpFile" id="member_upFile" >
                    <p class="edit_text">編輯大頭貼<i class="fas fa-pen"></i></p>    
            </label>
        </div>
      
        <!---------------------------------- 瀏覽上傳照片 ------------------------------------->
        <script type="text/javascript">
            $('#member_upFile').change(function () {
                var file = $('#member_upFile')[0].files[0];
                var reader = new FileReader;
                reader.onload = function (e) {
                    $('#imgPreview_pic').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            });

        </script>

    <!---------------------------------- 資料 ------------------------------------->
        <div class="mem_info">
            <div class="table_bg">
                <img class="redknot" src="images/red_knot.png" alt="蝴蝶結">
                <table class="member_data">
                    <tr>
                        <td>
                            <div class="edit_data"><h4>會員編號：</h4><?php echo $memNo ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="edit_data"><h4>身分證：</h4><?php echo $twId ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="edit_data"> <h4>姓氏：</h4> 
                            <input type="text" name="mem_memFirstName" id="mem_memFirstName" readonly="readonly" value="<?php echo $memFirstName ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="edit_data"> <h4>名字：</h4> 
                            <input type="text" name="mem_memLastName" id="mem_memLastName" readonly="readonly" value="<?php echo $memLastName ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="edit_data"> <h4>暱稱：</h4> 
                            <input type="text" name="mem_memNickname" id="mem_memNickname" readonly="readonly" value="<?php echo $memNickname ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="edit_data"><h4>帳號：</h4>
                            <input type="text" name="mem_memId" id="mem_memId" readonly="readonly" value="<?php echo $memId ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="edit_data"> <h4>密碼：</h4> 
                            <input type="password" name="mem_memPsw" id="mem_memPsw" readonly="readonly" value="<?php echo $memPsw ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="edit_data"> <h4>電話：</h4> 
                            <input type="tel" name="mem_memTel" id="mem_memTel" readonly="readonly" value="<?php echo $memTel ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="edit_data"> <h4>信箱：</h4> 
                            <input type="mail" name="mem_memEmail" id="mem_memEmail" readonly="readonly" value="<?php echo $memEmail ?>">

                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="btn_edit">
                <input type="button" name="edit_it" class="btn_s  edit_it" id="btn_edit" value="修改資料">
                <input type="submit" name="updated_it" class="btn_s updated_it" id="updated_it" value="確認修改">
            </div>
        </div>
    </div>
    </form>

    <script>
        $('#btn_edit').click(function () {
            $('#btn_edit').hide();
            $('#updated_it').show();

            document.getElementById("mem_memFirstName").readOnly = false;
            document.getElementById("mem_memLastName").readOnly = false;
            document.getElementById("mem_memNickname").readOnly = false;            
            document.getElementById("mem_memId").readOnly = false;
            document.getElementById("mem_memPsw").readOnly = false;
            document.getElementById("mem_memTel").readOnly = false;
            document.getElementById("mem_memEmail").readOnly = false;
        });

        $('#updated_it').click(function () {
            $('#btn_edit').show();
            $('#updated_it').hide();
        });
    </script>

    <!---------------------------------- 按鈕們 ------------------------------------->
    <ul class="menu">
        <li class="tablinks_reservation" ><a href="#">我的預約</a></li>
        <li class="meun_btn"><a href="#">我的湯牌</a>
            <ul>
                <li class="tablinks_card" ><a href="#">我的湯牌</a></li>
                <li class="tablinks_collection"><a href="#">我的收藏</a></li>
            </ul>
        </li>
        <li class="tablinks_post" ><a href="#">我的發表</a></li>
        <li class="tablinks_coupon"><a href="#">我的酷碰</a></li>
    </ul>

    <div class="function_area">
 
    <!---------------------------------- 我的預約 ------------------------------------->
        <div id="reservation" class="tabcontent reservation_area">
    <?php while($orderRow = $order -> fetch(PDO::FETCH_ASSOC)){
        ?> 
        
        
        <div class="reser_data">
            <div><p>訂單編號：</p><?php echo $orderRow['orderNo']; ?></div>
            <div><p>入住分店：</p><?php echo $orderRow['branchName']; ?></div>
            <div><p>使用的湯牌：</p><?php echo $orderRow['cardName']; ?></div>
            <div><p>總金額：</p><?php echo $orderRow['orderNewPrice']; ?></div>
            <div><p>入住時段：</p><?php
                                        if($orderRow['orderResTime'] ==1){
                                            echo "早上";
                                        }elseif($orderRow['orderResTime'] ==2){
                                            echo "下午";
                                        }else{
                                            echo "晚上";
                                        }
            
            ?>
            </div>
            <div><p>入住日期：</p><?php echo $orderRow['orderResDate'] ;?></div>       
        </div> 
        
    <?php
    }
    ?>
    </div>

        <!---------------------------------- 我的湯牌 ------------------------------------->

        <div id="card" class="card_area"> 

        </div>
        

    <!---------------------------------- 我的收藏 ------------------------------------->
        
    <div id="collection" class="collection_area">
        
       
    </div>







    <!---------------------------------- 我的發表 ------------------------------------->
        <div id="post" class="tabcontent post_area">
            <table class="post_data">
                <thead>
                    <tr>
                        <th>標題</th>
                        <th >湯牌</th>
                        <th class="post_title_time">日期</th>
                        <th>處理</th>
                    </tr>
                </thead>

            <?php while($postRow = $post -> fetch(PDO::FETCH_BOTH)){
            ?> 
                <tr id="post_table">
                    <td><?php echo $postRow['artTitle']; ?></td>
                    <td><?php echo $postRow['cardName']; ?></td>
                    <td class="post_data_time"><?php echo $postRow['artTime']; ?></td>
                    <td>
                        <i class="fas fa-pen"></i>
                        <i id="delete_icon<?php echo $postRow[0];?>" class="fas fa-trash-alt deleteBtn" artno=<?php echo $postRow[0]; ?>> </i>
                        
                    </td>
                </tr>
            <?php
            }
            ?>
            </table>
        </div>

 <!---------------------------------- 我的酷碰 ------------------------------------->
        <div id="coupon" class="tabcontent coupon_area">
            <?php while($couponRow = $coupon -> fetch(PDO::FETCH_ASSOC)){
            ?> 
            
            <div class="coupons">
                <div class="coupon_data">
                    <img class="coupon_dataImg" src="images/coupon.png" alt="酷碰">
                    <p class="coupon_num"><?php echo $couponRow['couponName']; ?></p>
                </div>
                <div class="coupon_date"><p>獲得日期:<?php echo $couponRow['memCouponDate']; ?></p></div>
            </div>
            <?php
            }
            ?>
        </div>



        <script>

                $(document).ready(function () {
                    $('.tablinks_reservation').click(function () {
                        $('#reservation').css('display', 'flex');
                        $('#card').hide();
                        $('#collection').hide();
                        $('#post').hide();
                        $('#coupon').hide();
                    });

                    $('.tablinks_card').click(function () {
                        $('#reservation').hide();
                        $('#card').css('display', 'flex');
                        $('#collection').hide();
                        $('#post').hide();
                        $('#coupon').hide();
                    });
                    $('.tablinks_collection').click(function () {
                        $('#reservation').hide();
                        $('#card').hide();
                        $('#collection').css('display', 'flex');
                        $('#post').hide();
                        $('#coupon').hide();
                    });
                    $('.tablinks_post').click(function () {
                        $('#reservation').hide();
                        $('#card').hide();
                        $('#collection').hide();
                        $('#post').css('display', 'flex');
                        $('#coupon').hide();
                    });
                    $('.tablinks_coupon').click(function () {
                        $('#reservation').hide();
                        $('#card').hide();
                        $('#collection').hide();
                        $('#post').hide();
                        $('#coupon').css('display', 'flex');
                    });
                });
            </script>

</section>



<script>
   

    // 我的湯牌 JSON PHP到前端
    cardResult=<?php 
                    $cardRow = $card -> fetchAll(PDO::FETCH_BOTH);
                    $cardJson = JSON_encode($cardRow);
                    echo $cardJson; 
                ?>

    // console.log(cardResult);
    cardInnerHtml = "";

    function checkNull(temp){
        if(!temp && typeof temp != "undefined" && temp != 0){
            // console.log(temp);
            return "";
        }else{
            // console.log(temp);
            return temp;
        }
    }

    for(let i = 0;i < cardResult.length;i++){
        // console.log(cardResult[i].cardText,cardResult[i].cardText.split("").length);
        cardTextLength = cardResult[i].cardText.split("").length;
        cardTextArry = cardResult[i].cardText.split("");
        for(let j = cardTextLength;j < 6;j++){
            cardTextArry[j] = "";
        }
        cardInnerHtml += `  <div class="cards">
                                <div class="card card${i}" cardNo="${cardResult[i].cardNo}" cardPrice="${cardResult[i].cardPrice}">
                                    <img class="knot" src="images/red_knot.png">
                                    <div class="front">
                                        


                                        <div class="draw">
                                            <div class="drawingArea" style="display: block;">
                                                <div class="circle circle0" style="transform: rotate(120deg); transform-origin: 50% 50%; color: ${cardResult[i].cardTextColor1};">
                                                    <p class="futura_R"
                                                        style="transform: rotate(378deg); left: -4.58359px; top: -58.8254px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[0]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(306deg); left: -31.4164px; top: -50.1068px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[0]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(234deg); left: -31.4164px; top: -21.8932px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[0]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(162deg); left: -4.58359px; top: -13.1746px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[0]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(90deg); left: 12px; top: -36px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[0]}
                                                        </p>
                                                </div>
                                                <div class="circle circle1" style="transform: rotate(123deg); transform-origin: 50% 50%; color: ${cardResult[i].cardTextColor2};">
                                                    <p class="futura_R"
                                                        style="transform: rotate(330deg); left: -36px; top: -77.5692px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[1]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(210deg); left: -36px; top: 5.56922px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[1]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(90deg); left: 36px; top: -36px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[1]}
                                                        </p>
                                                </div>
                                                <div class="circle circle2" style="transform: rotate(126deg); transform-origin: 50% 50%; color: ${cardResult[i].cardTextColor3};">
                                                        <p class="futura_R"
                                                            style="transform: rotate(417.273deg); left: 48.5703px; top: -74.9261px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(384.545deg); left: 17.9099px; top: -101.494px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(351.818deg); left: -22.2467px; top: -107.267px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(319.091deg); left: -59.15px; top: -90.414px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(286.364deg); left: -81.0835px; top: -56.2847px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(253.636deg); left: -81.0835px; top: -15.7153px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(220.909deg); left: -59.15px; top: 18.414px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(188.182deg); left: -22.2467px; top: 35.2671px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(155.455deg); left: 17.9099px; top: 29.4935px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(122.727deg); left: 48.5703px; top: 2.92614px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(90deg); left: 60px; top: -36px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                </div>
                                                <div class="circle circle3" style="transform: rotate(129deg); transform-origin: 50% 50%; color: ${cardResult[i].cardTextColor4};">
                                                        <p class="futura_R"
                                                            style="transform: rotate(398.571deg); left: 47.855px; top: -111.056px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(347.143deg); left: -33.362px; top: -129.593px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(295.714deg); left: -98.493px; top: -77.6528px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(244.286deg); left: -98.493px; top: 5.65284px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(192.857deg); left: -33.362px; top: 57.5931px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(141.429deg); left: 47.855px; top: 39.0558px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(90deg); left: 84px; top: -36px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                </div>
                                                <div class="circle circle4" style="transform: rotate(132deg); transform-origin: 50% 50%; color: ${cardResult[i].cardTextColor5};">
                                                    <p class="futura_R"
                                                        style="transform: rotate(428.824deg); left: 99.8967px; top: -79.349px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(407.647deg); left: 76.6811px; top: -116.843px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(386.471deg); left: 41.4886px; top: -143.42px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(365.294deg); left: -0.927797px; top: -155.488px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(344.118deg); left: -44.8396px; top: -151.419px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(322.941deg); left: -84.3162px; top: -131.762px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(301.765deg); left: -114.026px; top: -99.1719px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(280.588deg); left: -129.957px; top: -58.0499px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(259.412deg); left: -129.957px; top: -13.9501px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(238.235deg); left: -114.026px; top: 27.1719px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(217.059deg); left: -84.3162px; top: 59.7621px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(195.882deg); left: -44.8396px; top: 79.4191px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(174.706deg); left: -0.927797px; top: 83.4881px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(153.529deg); left: 41.4886px; top: 71.4196px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(132.353deg); left: 76.6811px; top: 44.8435px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(111.176deg); left: 99.8967px; top: 7.349px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(90deg); left: 108px; top: -36px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                </div>
                                                <div class="circle circle5" style="transform: rotate(135deg); transform-origin: 50% 50%; color: ${cardResult[i].cardTextColor6};">
                                                    <p class="futura_R"
                                                        style="transform: rotate(422.308deg); left: 115.506px; top: -102.92px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(394.615deg); left: 69.8013px; top: -154.51px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(366.923deg); left: 5.35728px; top: -178.95px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(339.231deg); left: -63.0631px; top: -170.642px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(311.538deg); left: -119.786px; top: -131.49px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(283.846deg); left: -151.816px; top: -70.4615px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(256.154deg); left: -151.816px; top: -1.53854px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(228.462deg); left: -119.786px; top: 59.4897px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(200.769deg); left: -63.0631px; top: 98.6423px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(173.077deg); left: 5.35728px; top: 106.95px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(145.385deg); left: 69.8013px; top: 82.5097px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(117.692deg); left: 115.506px; top: 30.9201px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(90deg); left: 132px; top: -36px; opacity: 1;font-family: ${cardResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                </div>
                                            </div>
                                        </div>      




                                        <h3 class="card_name">${cardResult[i].cardName}</h3>
                                        <div class="card_item_box">
                                            <div class="card_item card_item1">
                                                <div class="card_item_image">
                                                    <img src="${checkNull(cardResult[i].item1Img)}">
                                                </div>
                                                <h4 class="card_item_name card_item_name1">${checkNull(cardResult[i].item1Name)}</h4>
                                            </div>
                                            <div class="card_item card_item2">
                                                <div class="card_item_image">
                                                    <img src="${checkNull(cardResult[i].item2Img)}">
                                                </div>
                                                <h4 class="card_item_name card_item_name2">${checkNull(cardResult[i].item2Name)}</h4>
                                            </div>
                                            <div class="card_item card_item3">
                                                <div class="card_item_image">
                                                    <img src="${checkNull(cardResult[i].item3Img)}">
                                                </div>
                                                <h4 class="card_item_name card_item_name3">${checkNull(cardResult[i].item3Name)}</h4>
                                            </div>
                                            <div class="card_item card_item4">
                                                <div class="card_item_image">
                                                    <img src="${checkNull(cardResult[i].item4Img)}">
                                                </div>
                                                <h4 class="card_item_name card_item_name4">${checkNull(cardResult[i].item4Name)}</h4>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="card_btn_box">
                                                <a class="btn_s card_btn delete_card_btn" cardNoCard="${cardResult[i].cardNo}">刪除</a>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>`;
    }
    document.getElementById("card").innerHTML = cardInnerHtml;



    // =======================上面是我的，下面是收藏的=========================



    // 收藏湯牌 PHP JSON到前端
    collectResult=<?php 
                    $collectionRow = $collection -> fetchAll(PDO::FETCH_BOTH);
                    $collectionJson = JSON_encode($collectionRow);
                    echo $collectionJson; 
                ?>

    // console.log(collectResult);
    cardCollectInnerHtml = "";

    function checkNull(temp){
        if(!temp && typeof temp != "undefined" && temp != 0){
            // console.log(temp);
            return "";
        }else{
            // console.log(temp);
            return temp;
        }
    }

    for(let i = 0;i < collectResult.length;i++){
        // console.log(collectResult[i].cardText,collectResult[i].cardText.split("").length);
        cardTextLength = collectResult[i].cardText.split("").length;
        cardTextArry = collectResult[i].cardText.split("");
        for(let j = cardTextLength;j < 6;j++){
            cardTextArry[j] = "";
        }
        cardCollectInnerHtml += `  <div class="cards">
                                <div class="card card${i}" cardNo="${collectResult[i].cardNo}" cardPrice="${collectResult[i].cardPrice}">
                                    <img class="knot" src="images/red_knot.png">
                                    <div class="front">
                                        


                                        <div class="draw">
                                            <div class="drawingArea" style="display: block;">
                                                <div class="circle circle0" style="transform: rotate(120deg); transform-origin: 50% 50%; color: ${collectResult[i].cardTextColor1};">
                                                    <p class="futura_R"
                                                        style="transform: rotate(378deg); left: -4.58359px; top: -58.8254px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[0]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(306deg); left: -31.4164px; top: -50.1068px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[0]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(234deg); left: -31.4164px; top: -21.8932px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[0]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(162deg); left: -4.58359px; top: -13.1746px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[0]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(90deg); left: 12px; top: -36px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[0]}
                                                        </p>
                                                </div>
                                                <div class="circle circle1" style="transform: rotate(123deg); transform-origin: 50% 50%; color: ${collectResult[i].cardTextColor2};">
                                                    <p class="futura_R"
                                                        style="transform: rotate(330deg); left: -36px; top: -77.5692px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[1]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(210deg); left: -36px; top: 5.56922px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[1]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(90deg); left: 36px; top: -36px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[1]}
                                                        </p>
                                                </div>
                                                <div class="circle circle2" style="transform: rotate(126deg); transform-origin: 50% 50%; color: ${collectResult[i].cardTextColor3};">
                                                        <p class="futura_R"
                                                            style="transform: rotate(417.273deg); left: 48.5703px; top: -74.9261px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(384.545deg); left: 17.9099px; top: -101.494px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(351.818deg); left: -22.2467px; top: -107.267px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(319.091deg); left: -59.15px; top: -90.414px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(286.364deg); left: -81.0835px; top: -56.2847px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(253.636deg); left: -81.0835px; top: -15.7153px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(220.909deg); left: -59.15px; top: 18.414px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(188.182deg); left: -22.2467px; top: 35.2671px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(155.455deg); left: 17.9099px; top: 29.4935px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(122.727deg); left: 48.5703px; top: 2.92614px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(90deg); left: 60px; top: -36px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[2]}
                                                            </p>
                                                </div>
                                                <div class="circle circle3" style="transform: rotate(129deg); transform-origin: 50% 50%; color: ${collectResult[i].cardTextColor4};">
                                                        <p class="futura_R"
                                                            style="transform: rotate(398.571deg); left: 47.855px; top: -111.056px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(347.143deg); left: -33.362px; top: -129.593px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(295.714deg); left: -98.493px; top: -77.6528px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(244.286deg); left: -98.493px; top: 5.65284px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(192.857deg); left: -33.362px; top: 57.5931px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(141.429deg); left: 47.855px; top: 39.0558px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                        <p class="futura_R"
                                                            style="transform: rotate(90deg); left: 84px; top: -36px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[3]}
                                                            </p>
                                                </div>
                                                <div class="circle circle4" style="transform: rotate(132deg); transform-origin: 50% 50%; color: ${collectResult[i].cardTextColor5};">
                                                    <p class="futura_R"
                                                        style="transform: rotate(428.824deg); left: 99.8967px; top: -79.349px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(407.647deg); left: 76.6811px; top: -116.843px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(386.471deg); left: 41.4886px; top: -143.42px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(365.294deg); left: -0.927797px; top: -155.488px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(344.118deg); left: -44.8396px; top: -151.419px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(322.941deg); left: -84.3162px; top: -131.762px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(301.765deg); left: -114.026px; top: -99.1719px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(280.588deg); left: -129.957px; top: -58.0499px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(259.412deg); left: -129.957px; top: -13.9501px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(238.235deg); left: -114.026px; top: 27.1719px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(217.059deg); left: -84.3162px; top: 59.7621px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(195.882deg); left: -44.8396px; top: 79.4191px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(174.706deg); left: -0.927797px; top: 83.4881px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(153.529deg); left: 41.4886px; top: 71.4196px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(132.353deg); left: 76.6811px; top: 44.8435px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(111.176deg); left: 99.8967px; top: 7.349px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(90deg); left: 108px; top: -36px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[4]}
                                                        </p>
                                                </div>
                                                <div class="circle circle5" style="transform: rotate(135deg); transform-origin: 50% 50%; color: ${collectResult[i].cardTextColor6};">
                                                    <p class="futura_R"
                                                        style="transform: rotate(422.308deg); left: 115.506px; top: -102.92px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(394.615deg); left: 69.8013px; top: -154.51px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(366.923deg); left: 5.35728px; top: -178.95px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(339.231deg); left: -63.0631px; top: -170.642px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(311.538deg); left: -119.786px; top: -131.49px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(283.846deg); left: -151.816px; top: -70.4615px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(256.154deg); left: -151.816px; top: -1.53854px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(228.462deg); left: -119.786px; top: 59.4897px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(200.769deg); left: -63.0631px; top: 98.6423px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(173.077deg); left: 5.35728px; top: 106.95px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(145.385deg); left: 69.8013px; top: 82.5097px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(117.692deg); left: 115.506px; top: 30.9201px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                    <p class="futura_R"
                                                        style="transform: rotate(90deg); left: 132px; top: -36px; opacity: 1;font-family: ${collectResult[i].cardFont};">${cardTextArry[5]}
                                                        </p>
                                                </div>
                                            </div>
                                        </div>      




                                        <h3 class="card_name">${collectResult[i].cardName}</h3>
                                        <div class="card_item_box">
                                            <div class="card_item card_item1">
                                                <div class="card_item_image">
                                                    <img src="${checkNull(collectResult[i].item1Img)}">
                                                </div>
                                                <h4 class="card_item_name card_item_name1">${checkNull(collectResult[i].item1Name)}</h4>
                                            </div>
                                            <div class="card_item card_item2">
                                                <div class="card_item_image">
                                                    <img src="${checkNull(collectResult[i].item2Img)}">
                                                </div>
                                                <h4 class="card_item_name card_item_name2">${checkNull(collectResult[i].item2Name)}</h4>
                                            </div>
                                            <div class="card_item card_item3">
                                                <div class="card_item_image">
                                                    <img src="${checkNull(collectResult[i].item3Img)}">
                                                </div>
                                                <h4 class="card_item_name card_item_name3">${checkNull(collectResult[i].item3Name)}</h4>
                                            </div>
                                            <div class="card_item card_item4">
                                                <div class="card_item_image">
                                                    <img src="${checkNull(collectResult[i].item4Img)}">
                                                </div>
                                                <h4 class="card_item_name card_item_name4">${checkNull(collectResult[i].item4Name)}</h4>
                                            </div>
                                            <div class="card_btn_box">
                                                // <a class="btn_s card_btn" href="forum_article&cardNo=${collectResult[i].cardNo}">查看</a>
                                                <a class="btn_s card_btn delete_collection_btn" cardNoCollect="${collectResult[i].cardNo}">刪除</a>
                                            </div> 
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
    }
    document.getElementById("collection").innerHTML = cardCollectInnerHtml;








    var deleteCollectionBtnArr = document.getElementsByClassName("delete_collection_btn");

for(let i=0;i<deleteCollectionBtnArr.length;i++){
    deleteCollectionBtnArr[i].addEventListener("click",function(e){ 
        let trash = e.target;
        let body = trash.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;

        if(confirm('確定要刪除嗎?')){
            cardNo = this.getAttribute("cardNoCollect");

            memNo = <?php echo $memNo ?>;

            url = "mem_delete_collection.php?";
            url += `memNo=${memNo}`;
            url += `&cardNo=${cardNo}`;

            let xhr = new XMLHttpRequest();

            xhr.onload = function(){
                if( xhr.status == 200){
                   body.removeChild(trash.parentNode.parentNode.parentNode.parentNode.parentNode); 

                }else{ 
                    alert( xhr.status );
                }
            }  

            xhr.open("Get", url, true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

            xhr.send( null );


            }
       
    })
 }



 var deleteCardBtnArr = document.getElementsByClassName("delete_card_btn");



for(let i=0;i<deleteCardBtnArr.length;i++){
deleteCardBtnArr[i].addEventListener("click",function(e){ 
    
    let trash = e.target;
    let body = trash.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;

    if(confirm('確定要刪除嗎?')){
        cardNo = this.getAttribute("cardNoCard");

        memNo = <?php echo $memNo ?>;

        url = "mem_delete_card.php?";
        url += `memNo=${memNo}`;
        url += `&cardNo=${cardNo}`;

        let xhr = new XMLHttpRequest();

        xhr.onload = function(){
            if( xhr.status == 200){
               body.removeChild(trash.parentNode.parentNode.parentNode.parentNode.parentNode); 

            }else{ 
                alert( xhr.status );
            }
        }  

        xhr.open("Get", url, true);
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

        xhr.send( null );


        }
   
})
}






// 垃圾桶們
var deleteBtnArr = document.getElementsByClassName("deleteBtn");

// 為垃圾桶們加上點按function
for(let i=0;i<deleteBtnArr.length;i++){
    deleteBtnArr[i].addEventListener("click", function(e){
        let trash = e.target;
        let tbody = trash.parentNode.parentNode.parentNode;
        // artNo給值：被點按的垃圾筒的artno屬性值
        if(confirm('確定刪除嗎?')){
            artNo = this.getAttribute("artno");

            // memNo就是最一開始php拿到的memNo
            memNo = <?php echo $memNo;?>;

            // 模仿成php丟資料在網址上的字串樣子，並且把上面的
            url = "mem_art_update.php?";
            url += `memNo=${memNo}`;
            url += `&artNo=${artNo}`;


            //產生XMLHttpRequest物件
            let xhr = new XMLHttpRequest();

            xhr.onload = function(){
                if( xhr.status == 200){ //server端可以正確的執行
                  //remove this row from tbody
                   tbody.removeChild(trash.parentNode.parentNode); 

                }else{ //其它
                    alert( xhr.status );
                }
            }  

            //設定好所要連結的程式
            // var url = "mem_art_update.php";
            xhr.open("Get", url, true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

            //送出資料
            xhr.send( null );

        }

    })
}








</script>
 
</body>
</html>