<?php
try{
  require_once("php/connect.php");
    $sql = "
  			select * from member as m
			natural join (
				select artNo,artTitle,memNo,artText,date_format(artTime,'%Y-%m-%d') artTime1,artTime,artLikeCount,artMesCount,cardno,cardName,item1name,item1type,item1pointA,item1pointB,item1pointC,item1Img2Url,item2name,item2type,item2pointA,item2pointB,item2pointC,item2Img2Url,item3name,item3type,item3pointA,item3pointB,item3pointC,item3Img2Url,item4name,item4Img2Url,item4type,item4pointA,item4pointB,item4pointC from article a
				natural join (
					select cardno,cardName,item1name,item1type,item1pointA,item1pointB,item1pointC,item1Img2Url,item2name,item2type,item2pointA,item2pointB,item2pointC,item2Img2Url,item3name,item3type,item3pointA,item3pointB,item3pointC,item3Img2Url,item4name,item4Img2Url,item4type,item4pointA,item4pointB,item4pointC
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
	$sql3 = "select if(count(*)=0,null,1) likeType
            from member m
            join likes l
            where artNo = ".$_REQUEST['artNo']." and l.memNo = ".$_SESSION['memNo'].";";

	$article = $pdo->query($sql);

	$message = $pdo->query($sql2);

	$likeType = $pdo->query($sql3);
	$likeTypeRow = $likeType -> fetch(PDO::FETCH_ASSOC);



  
  
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
 ?>
				<div class="hot_forum_box hot_forum_box1 article_hot_forum_box">
					<div class="card card1 article_card">
						<img class="knot" src="images/red_knot.png">
						<div class="front">
							<img class="badge" src="images/badge.png">
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
								<a class="btn_s" href="">收藏它</a>
								<a class="btn_s" href="">去客制</a>
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
							<div class="mask"></div>
							<div class="hot_forum_methods forum_methods">
								<div class="circle"></div>
								<div class="circle"></div>
								<div class="circle"></div>
							</div>
							<ul class="hot_forum_methods_menu forum_methods_menu">
								<li>編輯</li>
								<li>刪除</li>
							</ul>
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
									<img class="heart_icon likeType<?php echo $likeTypeRow['likeType'] ?>" src="images/hollow_heart.png">
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
					<div class="mask"></div>
					<div class="methods forum_methods">
						<div class="circle"></div>
						<div class="circle"></div>
						<div class="circle"></div>
					</div>
					<ul class="methods_menu forum_methods_menu">
						<li>編輯</li>
						<li>刪除</li>
					</ul>
					<div class="msg_l">
						<div class="user_photo">
							<img src="<?php echo $messageRow['memImgUrl'] ?>">
						</div>
						<div class="user_name">
							<?php echo $messageRow['memNickname'] ?>
						</div>
					</div>
					<div class="msg_r">
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
		</div>

	</div>
	<div class="all_rights">
            <h4>Non commercial use&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright © 2019 Mr.Spring All rights reserved</h4>
    </div>
    <script type="text/javascript" src="js/forum_article_radar.js"></script>
</body>
</html>