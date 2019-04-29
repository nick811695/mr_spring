<?php
try{
  require_once("php/j_connect.php");
    $sq5 = "
  			select * from member as m
			natural join (
				select artNo,artTitle,artStatus,memNo,artText,date_format(artTime,'%Y-%m-%d') artTime,artLikeCount,artMesCount,cardno,cardName,item1name,item1type,item1pointA,item1pointB,item1pointC,item1Img2Url,item2name,item2type,item2pointA,item2pointB,item2pointC,item2Img2Url,item3name,item3type,item3pointA,item3pointB,item3pointC,item3Img2Url,item4name,item4Img2Url,item4type,item4pointA,item4pointB,item4pointC from article a
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
			where artStatus <> 0
			order by a.artLikeCount desc , a.artMesCount desc
			limit 0,3;
    	
    	";//forum by Like count top3


  
	$hot_article = $pdo->query($sq5);
  
  
}catch(PDOException $e){
  $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
  $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/share.css">
	<link rel="stylesheet" type="text/css" href="css/hot_forum.css">
	<link rel="stylesheet" type="text/css" href="css/forum.css">
	<link rel="stylesheet" type="text/css" href="css/card.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script src="js/Chart.js"></script>
	<script src="js/forum.js"></script>
</head>

<body>

<!-- <-- ------------hotforum start-------------- --> 

<div class="bg forum_bg">
		<div class="wrap forum_wrap">
			<h2 class="hot_forum_heading">熱門湯牌</h2>
			<div class="hot_forum_wrap">
				<img src="images/prev.png" id="prev">
				<img src="images/next.png" id="next">
<?php 
$i=0;
$radar=0;
while($hot_articleRow = $hot_article->fetch(PDO::FETCH_ASSOC)){
	$i++;
	$radar++;
	$pointA=$hot_articleRow['item1pointA']+$hot_articleRow['item2pointA']+$hot_articleRow['item3pointA'];
	$pointB=$hot_articleRow['item1pointB']+$hot_articleRow['item2pointB']+$hot_articleRow['item3pointB'];
	$pointC=$hot_articleRow['item1pointC']+$hot_articleRow['item2pointC']+$hot_articleRow['item3pointC'];
	$total=$pointA+$pointB+$pointC;
	$pointAprop=$pointA/$total;
	$pointBprop=$pointB/$total;
	$pointCprop=$pointC/$total;
?>
				<div class="hot_forum_box hot_forum_box<?php echo $i; ?>">
					<form class="readMore" action="forum_article.php" method="post">
						<input type="hidden" name="artNo" value="<?php echo $hot_articleRow['artNo'] ?>">

					</form>
					<div class="card card<?php echo $i;?> zoom_out">
						<img class="knot" src="images/red_knot.png">
						<div class="front">
							<img class="badge" src="images/badge.png">
							<h3 class="card_name"><?php echo $hot_articleRow['cardName']?></h3>
							<div class="card_item_box">
								<div class="card_item card_item1">
									<div class="card_item_image">
										<img src="<?php echo $hot_articleRow['item1Img2Url']?>">
									</div>
									<h4 class="card_item_name"><?php echo $hot_articleRow['item1name']?></h4>
								</div>
								<div class="card_item card_item2">
									<div class="card_item_image">
										<img src="<?php echo $hot_articleRow['item2Img2Url']?>">
									</div>
									<h4 class="card_item_name"><?php echo $hot_articleRow['item2name']?></h4>
								</div>
								<div class="card_item card_item3">
									<div class="card_item_image">
										<img src="<?php echo $hot_articleRow['item3Img2Url']?>">
									</div>
									<h4 class="card_item_name"><?php echo $hot_articleRow['item3name']?></h4>
								</div>
								<div class="card_item card_item4">
									<div class="card_item_image">
										<img src="<?php echo $hot_articleRow['item4Img2Url']?>">
									</div>
									<h4 class="card_item_name"><?php echo $hot_articleRow['item4name']?></h4>
								</div>
								<div class="clear"></div>
							</div>
							<div class="card_btn_box">
								<a class="btn_s" href="">收藏它</a>
								<a class="btn_s" href="">去客制</a>
							</div>
						</div>
					</div>

					<div class="hot_forum_hidden ">
						<div class="hot_forum">

							<div class="hot_user_data">
								<div class="user_photo">
									<img src="images/user_photo.png">
								</div>
								<h4 class="user_name"><?php echo $hot_articleRow['memNickname']?></h4>
							</div>
							<h3 class="forum_title">									
								<?php echo $hot_articleRow['artTitle']?>
							</h3>
							<div class="hot_forum_content">
								<div class="content_l">
									
									<div class="hot_forum_data">
										<p class="time"><?php echo $hot_articleRow['artTime']?></p>
										<p class="like">
											<img src="images/solid_heart.png">
										</p>
										<p><?php echo $hot_articleRow['artLikeCount']?></p>
										<p class="msg_count">
											<img src="images/msg_count_icon.png">
										</p>
										<p><?php echo $hot_articleRow['artMesCount']?></p>
										<div class="clear"></div>
									</div>
									<p class="article"><?php echo $hot_articleRow['artText']?></p>
								</div>
								<div class="content_r">
									<div class="radar_wrapper">
										<div id="pointA<?php echo $i ?>" hidden><?php echo $pointAprop ?></div>
										<div id="pointB<?php echo $i ?>" hidden><?php echo $pointBprop ?></div>
										<div id="pointC<?php echo $i ?>" hidden><?php echo $pointCprop ?></div>
									    <canvas id="chartRadar<?php echo $radar;?>" width="300" height="300"></canvas>
									</div>
								</div>
							</div>
							<form action="forum_article.php" method="post">
								<input type="hidden" name="artNo" value="<?php echo $hot_articleRow['artNo'] ?>">
								<input class="btn_s" type="submit" name="submit" value="查看更多">
							</form>
						</div>
					</div>
				</div>	

<?php	
}
?>
					
            </div>
    </div>      
</div>
    
<!-- /*------------hotforum end-------------*/ -->

    <script type="text/javascript" src="js/hot_forum_radar.js"></script>
</body>
</html>