<?php
try{
  require_once("php/connect.php");
  $sql = "
  			select * from member as m
			natural join (
				select artNo,artTitle,memNo,artText,date_format(artTime,'%Y-%m-%d') artTime,artTime artTime1,artLikeCount,artMesCount,cardno,cardName,item1name,item1type,item1pointA,item1pointB,item1pointC,item1Img2Url,item2name,item2type,item2pointA,item2pointB,item2pointC,item2Img2Url,item3name,item3type,item3pointA,item3pointB,item3pointC,item3Img2Url,item4name,item4Img2Url,item4type,item4pointA,item4pointB,item4pointC from article a
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
			order by a.artTime1 desc;
    
    	";//forum by time
    $sq4 = "
  			select * from member as m
			natural join (
				select artNo,artTitle,memNo,artText,date_format(artTime,'%Y-%m-%d') artTime,artLikeCount,artMesCount,cardno,cardName,item1name,item1type,item1pointA,item1pointB,item1pointC,item1Img2Url,item2name,item2type,item2pointA,item2pointB,item2pointC,item2Img2Url,item3name,item3type,item3pointA,item3pointB,item3pointC,item3Img2Url,item4name,item4Img2Url,item4type,item4pointA,item4pointB,item4pointC from article a
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
			order by a.artMesCount desc;
    
    	";//forum by MsgCount


    $sq5 = "
  			select * from member as m
			natural join (
				select artNo,artTitle,memNo,artText,date_format(artTime,'%Y-%m-%d') artTime,artLikeCount,artMesCount,cardno,cardName,item1name,item1type,item1pointA,item1pointB,item1pointC,item1Img2Url,item2name,item2type,item2pointA,item2pointB,item2pointC,item2Img2Url,item3name,item3type,item3pointA,item3pointB,item3pointC,item3Img2Url,item4name,item4Img2Url,item4type,item4pointA,item4pointB,item4pointC from article a
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
			order by a.artLikeCount desc , a.artMesCount desc
			limit 0,3;
    	
    	";//forum by Like count top3

  $sql2 = "select itemName from item;";  //filter mobile
  $sql3 = "select effectTypeName from effectType;"; //filter PC

  $article = $pdo->query($sql);
  $hot_article = $pdo->query($sq5);


  $item1 = $pdo->query($sql2);
  $item2 = $pdo->query($sql2);


  $effectType1 = $pdo->query($sql3);
  $effectType2 = $pdo->query($sql3);
  
  
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



	<div id="mobile_filter_mask"></div>
	<div id="mobile_filter">
		<label for="filter_ctrl" id="filter_btn">篩選</label>
		<label for="sort_ctrl" id="sort_btn">排序</label>
		<label id="search_btn" for="mobile_search"><img src="images/search_icon.png"></label>
		<input id="mobile_search" type="text" name="search">
	</div>

	<div id="filter_wrap">
		<div class="sort_wrap">
			<h4>排序方式</h4>
			<ul id="sort_wrap">
				<li><span>依時間</span><img class="checked" src="images/check.png"></li>
				<li><span>依回覆數</span><img src="images/check.png"></li>
				<li><span>依熱門度</span><img src="images/check.png"></li>
			</ul>
		</div>
		<div class="filter_kind">
			<h4>選擇種類</h4>
			<ul id="filter_kind">
<?php
while($effectTypeRow1 = $effectType1->fetch(PDO::FETCH_ASSOC)){
?>
				<li><span><?php echo $effectTypeRow1['effectTypeName']?></span><img src="images/check.png"></li>
<?php
}
?>
			</ul>
		</div>
		<div class="filter_item">
			<h4>選擇藥材</h4>
			<ul id="filter_item">
<?php 
while($itemRow1 = $item1->fetch(PDO::FETCH_ASSOC)){
?>
				<li><span><?php echo $itemRow1['itemName']?></span><img src="images/check.png"></li>
<?php	
}
?>
				
			</ul>
		</div>
	</div>




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

					<div class="hot_forum_hidden">
						<div class="hot_forum">
							<div id="mask"></div>
							<div class="hot_forum_methods">
								<div class="circle"></div>
								<div class="circle"></div>
								<div class="circle"></div>
							</div>
							<ul class="hot_forum_methods_menu">
								<li>編輯</li>
								<li>刪除</li>
							</ul>
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
			<a href="forum_article_publish.php" class="btn_l">我要發表</a>
			
			<div class="forum_filter">
				<div class="mask"></div>
				<div class="kind_of_forum">
					<div class="count">0</div>
					<ul id="kind_of_forum_box">
						<li>選擇療效</li>
<?php 
$i=0;
while($effectTypeRow2 = $effectType2->fetch(PDO::FETCH_ASSOC)){
$i++;
?>
						<li>
							<input type="checkbox" name="kind" id="kind<?php echo $i; ?>">
							<label for="kind<?php echo $i; ?>"><?php echo $effectTypeRow2['effectTypeName']?></label>
							<img src="images/check.png">
						</li>
						

<?php 
}
?>
					</ul>
				</div>
				<div class="item_of_forum">
					<div class="count">0</div>
					<ul id="item_of_forum_box">
						<li>選擇藥材</li>
<?php
$i=0;
while($itemRow2 = $item2->fetch(PDO::FETCH_ASSOC)){
$i++;

?>
						<li><input type="checkbox" name="item" id="item<?php echo $i; ?>"><label for="item<?php echo $i; ?>"><?php echo $itemRow2['itemName']?></label><img src="images/check.png"></li>
<?php  
}
?>
						
					</ul>
				</div>
				<div class="sort_forum">
					<!-- <p>排序：</p> -->
					<span>
						<input type="radio" name="sort" id="sort1" checked>
						<label for="sort1">依時間</label>
					</span>
					<span>
						<input type="radio" name="sort" id="sort2">
						<label for="sort2">依熱門度</label>
					</span>
					<span>
						<input type="radio" name="sort" id="sort3">
						<label for="sort3">依回覆數</label>
					</span>
				</div>
			</div>
			<div class="forum_search" id="forum_search">
				<input type="text" name="search" placeholder="請輸入關鍵字"><span><img src="images/search_icon.png"></span>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
				

			<div class="forum_box">
<?php 
while($articleRow = $article->fetch(PDO::FETCH_ASSOC)){
?>
				<div class="forum">
					<div class="user_photo"><img src="images/user_photo.png" alt="user"></div>
					<div class="forum_data">
						<p class="user_name"><?php echo $articleRow['memNickname']?></p>
						<p class="time"><?php echo $articleRow['artTime']?></p>
						<p class="forum_item">
							<a href="#fourm_search"><span class="item_kind<?php echo $articleRow['item1type']?>"><?php echo $articleRow['item1name']?></span></a>
							<a href="#fourm_search"><span class="item_kind<?php echo $articleRow['item2type']?>"><?php echo $articleRow['item2name']?></span></a>
							<a href="#fourm_search"><span class="item_kind<?php echo $articleRow['item3type']?>"><?php echo $articleRow['item3name']?></span></a>
							<a href="#fourm_search"><span class="item_kind<?php echo $articleRow['item4type']?>"><?php echo $articleRow['item4name']?></span></a>
						</p>
					</div>
					<div class="clear"></div>
					<div class="forum_content">
						<form class="readMore" action="forum_article.php" method="post">
							<input type="hidden" name="artNo" value="<?php echo $articleRow['artNo']?>">
						</form>
						<div class="forum_title">
							<h3><?php echo $articleRow['artTitle']?></h3>
							<h4 class="forum_kind_title1 forum_kind_title"><img src="images/green_knot.png">安定心神</h4>
							<div class="clear"></div>
						</div>
						<p><?php echo $articleRow['artText']?></p>
						<div class="forum_count">
					
							<div class="like">
								<img src="images/solid_heart.png">
								<p><?php echo $articleRow['artLikeCount']?></p>
							</div>
							
							<div class="msg_count">
								<img src="images/msg_count_icon.png">
								<p><?php echo $articleRow['artMesCount']?></p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>




<?php 
}
?>
				




				
				
			</div>
		</div>
	</div>
	
    <footer>
			<div class="all_rights">
				<h4>Non commercial use&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright © 2019 Mr.Spring All rights
					reserved</h4>
			</div>
	</footer>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/hot_forum_radar.js"></script>
</body>
</html>