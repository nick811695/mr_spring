<?php
try{
  require_once("php/j_connect.php");
    $sql = "
  			select * from member as m
				natural join (
					select effectTypeNo,artNo,artTitle,memNo,artText,date_format(artTime,'%Y-%m-%d') artTime1,artTime,artLikeCount,artStatus,artMesCount,cardno,cardText,cardFont,cardTextColor1,cardTextColor2,cardTextColor3,cardTextColor4,cardTextColor5,cardTextColor6,cardName,item1name,item1type,item1pointA,item1pointB,item1pointC,item1Img2Url,item2name,item2type,item2pointA,item2pointB,item2pointC,item2Img2Url,item3name,item3type,item3pointA,item3pointB,item3pointC,item3Img2Url,item4name,item4Img2Url,item4type,item4pointA,item4pointB,item4pointC 
					from article a
					natural join (
						select effectTypeNo, cardno,cardText,cardFont,cardTextColor1,cardTextColor2,cardTextColor3,cardTextColor4,cardTextColor5,cardTextColor6,cardName,item1name,item1type,item1pointA,item1pointB,item1pointC,item1Img2Url,item2name,item2type,item2pointA,item2pointB,item2pointC,item2Img2Url,item3name,item3type,item3pointA,item3pointB,item3pointC,item3Img2Url,item4name,item4Img2Url,item4type,item4pointA,item4pointB,item4pointC
						from card
						natural join (
							select a.effectTypeNo item1type,a.pointA item1pointA,a.pointB item1pointB,a.pointC item1pointC,a.itemImg2Url item1Img2Url,a.itemname item1name,b.cardno
							from carditem1 b
							left outer join item a
							on a.itemno = b.item1no)as a
						natural join (
							select a.effectTypeNo item2type,a.pointA item2pointA,a.pointB item2pointB,a.pointC item2pointC,a.itemImg2Url item2Img2Url,a.itemname item2name,b.cardno
							from carditem2 b
							left outer join item a
							on a.itemno = b.item2no)as b
						natural join (
							select a.effectTypeNo item3type,a.pointA item3pointA,a.pointB item3pointB,a.pointC item3pointC,a.itemImg2Url item3Img2Url,a.itemname item3name,b.cardno
							from carditem3 b
							left outer join item a
							on a.itemno = b.item3no)as c
						natural join (
							select a.effectTypeNo item4type,a.pointA item4pointA,a.pointB item4pointB,a.pointC item4pointC,a.itemImg2Url item4Img2Url,a.itemname item4name,b.cardno
							from carditem4 b
							left outer join item a
							on a.itemno = b.item4no)as d) as a
				)as a
				where artNo = ".$_REQUEST['artNo'].";";

	$sql2 = "select artNo,mesNo,memNo,memNickname,memImgUrl,mesText,mesTime 
            from message
            natural join member
            where artNo = ".$_REQUEST['artNo']."
			order by mesTime desc;";
if(isset($_SESSION['memNo'])){
	$sql3 = "select if(count(*)=0,null,1) likeType
            from member m
            join likes l
						where artNo = ".$_REQUEST['artNo']." and l.memNo = ".$_SESSION['memNo'].";";
	$likeType = $pdo->query($sql3);
	$likeTypeRow = $likeType -> fetch(PDO::FETCH_ASSOC);
}
	
	$sql4 = "select * from article
						where artNo = ".$_REQUEST['artNo']."
					;";
	$artStatus = $pdo->query($sql4);
	$artStatusRow = $artStatus->fetch(PDO::FETCH_ASSOC);
	$article = $pdo->query($sql);

	$message = $pdo->query($sql2);






  
  
}catch(PDOException $e){
  $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
  $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/share.css">
	<link rel="stylesheet" type="text/css" href="css/card.css">
	<link rel="stylesheet" type="text/css" href="css/hot_forum.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/forum.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script src="js/Chart.js"></script>
	<script src="js/forum.js"></script>
	

</head>
<body>
<?php 
if(	$artStatusRow['artStatus']==0){
	header('Location: index.php');
}
?>
	<div class="bg forum_bg">
		<div class="wrap forum_wrap ">
			<div class="hot_forum_wrap article_hot_forum_wrap">
<?php 
while ($articleRow = $article -> fetch(PDO::FETCH_ASSOC)) {
	$pointA=$articleRow['item1pointA']+$articleRow['item2pointA']+$articleRow['item3pointA'];
	$pointB=$articleRow['item1pointB']+$articleRow['item2pointB']+$articleRow['item3pointB'];
	$pointC=$articleRow['item1pointC']+$articleRow['item2pointC']+$articleRow['item3pointC'];
	$total=$pointA+$pointB+$pointC;
	$pointAprop=$pointA/$total;
	$pointBprop=$pointB/$total;
	$pointCprop=$pointC/$total;
	$cardTextArr = str_split($articleRow['cardText']);
	$null = count($cardTextArr);
	if($null<6){
		for($x=0;$x<6-$null;$x++){
			$cardTextArr[]="";
		}
	}
 ?>
				<div class="hot_forum_box hot_forum_box1 article_hot_forum_box" effectTypeNo="<?php echo $articleRow['effectTypeNo'] ?>" artno="<?php echo $articleRow['artNo'] ?>">
					<div class="card card1 article_card">
						<img class="knot" src="images/red_knot.png">
						<div class="front">
							<div class="draw">
								<div class="drawingArea" style="display: block;">
										<div class="circle circle0" style="transform: rotate(120deg); transform-origin: 50% 50%; color: <?php echo $articleRow['cardTextColor1'] ?>;">
												<p class="futura_R"
														style="transform: rotate(378deg); left: -4.58359px; top: -58.8254px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[0] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(306deg); left: -31.4164px; top: -50.1068px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[0] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(234deg); left: -31.4164px; top: -21.8932px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[0] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(162deg); left: -4.58359px; top: -13.1746px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[0] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(90deg); left: 12px; top: -36px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[0] ?>
														</p>
										</div>
										<div class="circle circle1" style="transform: rotate(123deg); transform-origin: 50% 50%; color: <?php echo $articleRow['cardTextColor2'] ?>;">
												<p class="futura_R"
														style="transform: rotate(330deg); left: -36px; top: -77.5692px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[1] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(210deg); left: -36px; top: 5.56922px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[1] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(90deg); left: 36px; top: -36px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[1] ?>
														</p>
										</div>
										<div class="circle circle2" style="transform: rotate(126deg); transform-origin: 50% 50%; color: <?php echo $articleRow['cardTextColor3'] ?>;">
														<p class="futura_R"
																style="transform: rotate(417.273deg); left: 48.5703px; top: -74.9261px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(384.545deg); left: 17.9099px; top: -101.494px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(351.818deg); left: -22.2467px; top: -107.267px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(319.091deg); left: -59.15px; top: -90.414px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(286.364deg); left: -81.0835px; top: -56.2847px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(253.636deg); left: -81.0835px; top: -15.7153px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(220.909deg); left: -59.15px; top: 18.414px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(188.182deg); left: -22.2467px; top: 35.2671px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(155.455deg); left: 17.9099px; top: 29.4935px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(122.727deg); left: 48.5703px; top: 2.92614px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(90deg); left: 60px; top: -36px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[2] ?>
																</p>
										</div>
										<div class="circle circle3" style="transform: rotate(129deg); transform-origin: 50% 50%; color: <?php echo $articleRow['cardTextColor4'] ?>;">
														<p class="futura_R"
																style="transform: rotate(398.571deg); left: 47.855px; top: -111.056px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[3] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(347.143deg); left: -33.362px; top: -129.593px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[3] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(295.714deg); left: -98.493px; top: -77.6528px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[3] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(244.286deg); left: -98.493px; top: 5.65284px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[3] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(192.857deg); left: -33.362px; top: 57.5931px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[3] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(141.429deg); left: 47.855px; top: 39.0558px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[3] ?>
																</p>
														<p class="futura_R"
																style="transform: rotate(90deg); left: 84px; top: -36px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[3] ?>
																</p>
										</div>
										<div class="circle circle4" style="transform: rotate(132deg); transform-origin: 50% 50%; color: <?php echo $articleRow['cardTextColor5'] ?>;">
												<p class="futura_R"
														style="transform: rotate(428.824deg); left: 99.8967px; top: -79.349px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(407.647deg); left: 76.6811px; top: -116.843px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(386.471deg); left: 41.4886px; top: -143.42px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(365.294deg); left: -0.927797px; top: -155.488px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(344.118deg); left: -44.8396px; top: -151.419px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(322.941deg); left: -84.3162px; top: -131.762px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(301.765deg); left: -114.026px; top: -99.1719px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(280.588deg); left: -129.957px; top: -58.0499px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(259.412deg); left: -129.957px; top: -13.9501px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(238.235deg); left: -114.026px; top: 27.1719px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(217.059deg); left: -84.3162px; top: 59.7621px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(195.882deg); left: -44.8396px; top: 79.4191px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(174.706deg); left: -0.927797px; top: 83.4881px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(153.529deg); left: 41.4886px; top: 71.4196px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(132.353deg); left: 76.6811px; top: 44.8435px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(111.176deg); left: 99.8967px; top: 7.349px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(90deg); left: 108px; top: -36px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[4] ?>
														</p>
										</div>
										<div class="circle circle5" style="transform: rotate(135deg); transform-origin: 50% 50%; color: <?php echo $articleRow['cardTextColor6'] ?>;">
												<p class="futura_R"
														style="transform: rotate(422.308deg); left: 115.506px; top: -102.92px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(394.615deg); left: 69.8013px; top: -154.51px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(366.923deg); left: 5.35728px; top: -178.95px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(339.231deg); left: -63.0631px; top: -170.642px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(311.538deg); left: -119.786px; top: -131.49px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(283.846deg); left: -151.816px; top: -70.4615px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(256.154deg); left: -151.816px; top: -1.53854px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(228.462deg); left: -119.786px; top: 59.4897px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(200.769deg); left: -63.0631px; top: 98.6423px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(173.077deg); left: 5.35728px; top: 106.95px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(145.385deg); left: 69.8013px; top: 82.5097px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(117.692deg); left: 115.506px; top: 30.9201px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
												<p class="futura_R"
														style="transform: rotate(90deg); left: 132px; top: -36px; opacity: 1;font-family: <?php echo $articleRow['cardFont'] ?>;"><?php echo $cardTextArr[5] ?>
														</p>
										</div>
								</div>
							</div>  
							<h3 class="card_name"><?php echo $articleRow['cardName'] ?></h3>
							<div class="card_item_box">
								<div class="card_item card_item1">
									<div class="card_item_image">
										<img src="<?php echo $articleRow['item1Img2Url'] ?>">
									</div>
									<h4 class="card_item_name"><?php echo $articleRow['item1name'] ?></h4>
								</div>
								<div class="card_item card_item2">
									<div class="card_item_image">
										<img src="<?php echo $articleRow['item2Img2Url'] ?>">
									</div>
									<h4 class="card_item_name"><?php echo $articleRow['item2name'] ?></h4>
								</div>
								<div class="card_item card_item3">
									<div class="card_item_image">
										<img src="<?php echo $articleRow['item3Img2Url'] ?>">
									</div>
									<h4 class="card_item_name"><?php echo $articleRow['item3name'] ?></h4>
								</div>
								<div class="card_item card_item4">
									<div class="card_item_image">
										<img src="<?php echo $articleRow['item4Img2Url'] ?>">
									</div>
									<h4 class="card_item_name"><?php echo $articleRow['item4name'] ?></h4>
								</div>
								<div class="clear"></div>
							</div>
							<div class="card_btn_box">
								<button class="btn_s keep_btn" artno="<?php echo $articleRow['artNo'] ?>">收藏它</button>
<script>
$(".card_btn_box .keep_btn").off("click").click(function(){
	var artNo=$(this).attr('artno');
	var xhr = new  XMLHttpRequest();
	xhr.onreadystatechange=function (){
			if( xhr.readyState == 4){
					if( xhr.status == 200 ){
							if(xhr.responseText==1){
									// 原程式後續function
									$.ajax({
										url: 'php/keep_card.php',
										data: {artNo:artNo},
										type: 'GET',
										async: false,
										success: function(data){
												alert(data);
												console.log(data);
										},

										error: function(data){
											// console.log(123);
										}
								});
							}else{
									// 出現要求登入提示
									alert('請先登入會員');
							}
					}else{
					alert( xhr.status );
					}
			}
	}
	var url = "php/login_or_not.php?";

	xhr.open("Get", url, true);
	xhr.send( null );

	// console.log("artNo : ",artNo);

});
</script>
								<button class="btn_s" href="">去客制</button>
							</div>
						</div>
					</div>
					
					<div class="article_info">
						<div class="article_info_mask"></div>
						<div id="info_close" class="btn_s">關閉</div>
						<h3><?php echo $articleRow['cardName'] ?></h3>
						<div class="article_info_radar">
							<div id="pointA1" hidden><?php echo $pointAprop ?></div>
							<div id="pointB1" hidden><?php echo $pointBprop ?></div>
							<div id="pointC1" hidden><?php echo $pointCprop ?></div>
							<div id="info_radar_wrap">
								<canvas id="chartRadar2" width="300" height="300"></canvas>
							</div>
						</div>
					</div>
					<div class="hot_forum_hidden article_hot_forum_hidden">
						<div class="hot_forum">
							<div class="article_info_btn">
								<img src="images/info_icon.png">
							</div>
<?php
if(isset($_SESSION['memNo'])){
	if($_SESSION['memNo'] == $articleRow['memNo']){

?>	
							<div class="mask"></div>
							<div class="hot_forum_methods forum_methods">
								<div class="circle"></div>
								<div class="circle"></div>
								<div class="circle"></div>
							</div>
							<ul class="hot_forum_methods_menu forum_methods_menu">
								<form action="edit_article.php" method="post" class="edit_article">
									<input type="hidden" name="artNo" value="<?php echo $articleRow['artNo'] ?>">
								</form>
								<li>編輯</li>
								<li>刪除</li>
							</ul>
<?php
	}
}
?>
<script>
	$(".hot_forum .forum_methods_menu li:eq(0)").click(function(){
		$('.edit_article').submit();
	});
	$(".hot_forum .forum_methods_menu li:eq(1)").click(function(){
		var artNo = $('.edit_article input').val();
		window.location=`php/delete_art.php?artNo=${artNo}`;
	});
</script>

							
							<div class="hot_user_data">
								<div class="user_photo">
									<img src="images/user_photo.png">
								</div>
								<h4 class="user_name"><?php echo $articleRow['memNickname'] ?></h4>
							</div>
							<h3 class="forum_title"><?php echo $articleRow['artTitle'] ?></h3>
							<div class="card_item_mobile">
								<span class="kind<?php echo $articleRow['item1type'] ?>"><?php echo $articleRow['item1name'] ?></span>
								<span class="kind<?php echo $articleRow['item2type'] ?>"><?php echo $articleRow['item2name'] ?></span>
								<span class="kind<?php echo $articleRow['item3type'] ?>"><?php echo $articleRow['item3name'] ?></span>
								<span class="kind<?php echo $articleRow['item4type'] ?>"><?php echo $articleRow['item4name'] ?></span>
							</div>
							<p class="time time_inner"><?php echo $articleRow['artTime'] ?></p>
							
							<div class="hot_forum_content">
								<div class="content_l">
									<p class="article"><?php echo $articleRow['artText'] ?></p>
								</div>
								<div class="content_r">
									<div id="pointA2" hidden><?php echo $pointAprop ?></div>
									<div id="pointB2" hidden><?php echo $pointBprop ?></div>
									<div id="pointC2" hidden><?php echo $pointCprop ?></div>
									<div class="radar_wrapper">
									    <canvas id="chartRadar" width="300" height="300"></canvas>
									</div>
								</div>

							</div>
							<div class="hot_forum_data forum_data_inner">
								<p class="like">
									<div hidden><?php echo $articleRow['artNo'] ?></div>
<?php
if(isset($_SESSION['memNo'])){
?>
										<img class="heart_icon likeType<?php echo $likeTypeRow['likeType'] ?>" src="images/hollow_heart.png">
<?php										
}else{
?>
										<img class="heart_icon" src="images/hollow_heart.png">
<?php
}
?>
<script>
	/*----like-----*/
if ($(".heart_icon").hasClass("likeType")){
	$(".heart_icon").attr("src","images/hollow_heart.png");
}else if($(".heart_icon").hasClass("likeType1")){
	$(".heart_icon").attr("src","images/solid_heart.png");
}
$('.heart_icon').click(function(){


	var xhr = new  XMLHttpRequest();

	xhr.onreadystatechange=function (){
			if( xhr.readyState == 4){
					if( xhr.status == 200 ){
							if(xhr.responseText==1){
									// 原程式後續function
									if ($(this).hasClass('likeType1')) {
										$(this).attr("src","images/hollow_heart.png");
										$(this).removeClass('likeType1');
										$(this).addClass('likeType');
										var artNo = $(this).siblings("div").text();
										// console.log(artNo);
										$.ajax({
												url: './php/like.php',
												data: {
													artNo:artNo,
													type:"1",
													},
												type: 'GET',
												async: false,
												success: function(data){
														$(".likeNum").text(data);
												},
										});
									}else {
										var artNo = $(this).siblings("div").text();
										$(this).attr("src","images/solid_heart.png");
										$(this).removeClass('likeType');
										$(this).addClass('likeType1');
										$.ajax({
												url: './php/like.php',
												data: {
													artNo:artNo,
													type:"2",
													},
												type: 'GET',
												async: false,
												success: function(data){
														$(".likeNum").text(data);
												},
										});
									}
							}else{
									// 出現要求登入提示
									alert('請先登入會員');
							}
					}else{
					alert( xhr.status );
					}
			}
	}
	var url = "php/login_or_not.php?";

	xhr.open("Get", url, true);
	xhr.send( null );

});
</script>									
								</p>
								<p class="likeNum"><?php echo $articleRow['artLikeCount'] ?></p>
								<p class="msg_count">
									<a href="#publish_wrap"><img src="images/msg_count_icon.png"></a>
								</p>
								<p class="msgNum"><?php echo $articleRow['artMesCount'] ?></p>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
<?php 
}
 ?>
			</div>

			<div class="msg_wrap">
<?php 
while ($messageRow = $message -> fetch(PDO::FETCH_ASSOC)) {
?>
				<div class="msg_box">
<?php
if(isset($_SESSION['memNo'])){
	if($_SESSION['memNo']==$messageRow['memNo']){

?>
					<div class="mask"></div>
					<div class="methods forum_methods">
						<div class="circle"></div>
						<div class="circle"></div>
						<div class="circle"></div>
					</div>
					<ul class="methods_menu forum_methods_menu">
						<li class="editbtn"><label>編輯<label></li>
						<li class="deletebtn">刪除</li>
					</ul>
<?php 
	}else{
?>	
					<!-- <div class="mask"></div>
					<div class="methods forum_methods">
						<div class="circle"></div>
						<div class="circle"></div>
						<div class="circle"></div>
					</div>
					<ul class="methods_menu forum_methods_menu">
						<li>檢舉</li>
					</ul> -->
<?php 
	}
}
?>	
					<div class="msg_l">
						<div class="user_photo">
							<img src="<?php echo $messageRow['memImgUrl'] ?>">
						</div>
						<div class="user_name">
							<?php echo $messageRow['memNickname'] ?>
						</div>
					</div>
					<div class="msg_r" artNo="<?php echo $messageRow['artNo'] ?>" mesNo="<?php echo $messageRow['mesNo'] ?>">
						<p><?php echo $messageRow['mesText'] ?></p>
						<div class="time">
							<?php echo $messageRow['mesTime'] ?>
						</div>
					</div>
				</div>
				
				
<?php 
}
 ?>				
			</div>
			

			<img src="images/decoration1.png">
<?php 
if(isset($_SESSION['memNO'])){
?>

			<div class="publish_wrap" id="publish_wrap">
				<div class="msg_box">
					<div class="msg_l publish_msg_l">
						<div class="user_photo">
							<img src="images/user_photo.png">
						</div>
						<div class="user_name">
							<?php $_SESSION['memNickname']; ?>
						</div>
					</div>
					<div class="msg_r publish_msg_r">
						<form action="php/add_mes.php" id="addMes">
							<input type="hidden" name="artNo" value="<?php echo $_REQUEST['artNo'] ?>">
							<textarea placeholder="你的留言...(150字以內)" name="mesText" minlength="1" maxlength="150"></textarea>
						</form>
						<input type="button" value="留言" name='submit'>
					</div>
				</div>
			</div>

<?php
}else{
	echo "<div class='btn_s mes_login'>登入留言</div>";
}
?>			

		</div>

	</div>
	<div class="all_rights">
            <h4>Non commercial use&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright © 2019 Mr.Spring All rights reserved</h4>
    </div>
    <script type="text/javascript" src="js/forum_article_radar.js"></script>
</body>
</html>