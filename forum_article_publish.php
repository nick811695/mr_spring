<?php 

try{
  require_once("php/yt_connect.php");
  	// $memNo = $_SESSION["memNo"];
  	// $memId = $_SESSION["memId"];
  	// $memNickname = $_SESSION["memNickname"];
  	$sql = "select *
			from card c
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
				on a.itemno = b.item4no)as d
			where memNo = 1;"; //mem_card
	
	$mem_card = $pdo -> query($sql);

}catch(PDOException $e){
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}





 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/forum.css">
	<link rel="stylesheet" type="text/css" href="css/share.css">
	<link rel="stylesheet" type="text/css" href="css/card.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/slick.css">
</head>
<body>

	<div class="forum_bg bg article_publish_bg">
		<div class="forum_wrap article_publish_wrap">
			<div class="article_publish">
			<button class="add_card btn_s springCard">選擇湯牌</button>
			<div class="selected_card_data">
				尚未選擇湯牌
			</div>
			<section id="lightbox_wrapper">
		        <div id="lightbox">
		            <!-- <div id="lightboxToggle"></div> -->
		            <div id="lightbox_radar_mask"></div>
		            <div id="lightbox_radar">
	            		<div id="lightbox_radar_close" class="btn_s">關閉</div>
	            		<div id="lightbox_radar_wrapper">
					        <canvas id="chartRadar" width="300" height="300"></canvas>
					    </div>
	            	</div>
		            <div class="chooseCard_d">
		                <h3>選擇湯牌</h3>
		                <div id="lightbox_filter_mask"></div>
		                <div class="lightbox_filter">
		                	<img src="images/filter.png">
		            		<select id="lightbox_filter_select">
		            			<option value="Choice 1">全部湯牌</option>
		            			<option value="Choice 2">自己製作</option>
		            			<option value="Choice 3">討論區收藏</option>
		            		</select>
		            	</div>
		                <label for="lightbox_radar" id="lightbox_radar_btn"><img src="images/info_icon.png"></label>
		            	
		                <div class="select-box">
		                    <label for="select-box1" class="label select-box1"><span class="label-desc">全部湯牌</span> </label>
		                    <select id="select-box1" class="select">
		                        <option value="Choice 1">全部湯牌</option>
		                        <option value="Choice 2">自己製作</option>
		                        <option value="Choice 3">討論區收藏</option>
		                    </select>  
		                </div>
		                
		                <div class="chooseCardArea_d">
		                    <div class="responsive">
<?php
$i=0;
while ($mem_cardRow = $mem_card->fetch(PDO::FETCH_ASSOC)) {
$i++;
?>	
								<div class="cards">
		                            <div class="card card<?php echo $i ?>" cardNo="<?php echo $mem_cardRow['cardNo'] ?>" cardPrice="<?php echo $mem_cardRow['cardPrice'] ?>">
										<img class="knot" src="images/red_knot.png">
										<div class="front">
											<img class="badge" src="images/badge.png">
											<h3 class="card_name"><?php echo $mem_cardRow['cardName'] ?></h3>
											<div class="card_item_box">
												<div class="card_item card_item1">
													<div class="card_item_image">
														<img src="<?php echo $mem_cardRow['item1Img2Url'] ?>">
													</div>
													<h4 class="card_item_name card_item_name1"><?php echo $mem_cardRow['item1name'] ?></h4>
												</div>
												<div class="card_item card_item2">
													<div class="card_item_image">
														<img src="<?php echo $mem_cardRow['item2Img2Url'] ?>">
													</div>
													<h4 class="card_item_name card_item_name2"><?php echo $mem_cardRow['item2name'] ?></h4>
												</div>
												<div class="card_item card_item3">
													<div class="card_item_image">
														<img src="<?php echo $mem_cardRow['item3Img2Url'] ?>">
													</div>
													<h4 class="card_item_name card_item_name3"><?php echo $mem_cardRow['item3name'] ?></h4>
												</div>
												<div class="card_item card_item4">
													<div class="card_item_image">
														<img src="<?php echo $mem_cardRow['item4Img2Url'] ?>">
													</div>
													<h4 class="card_item_name card_item_name4"><?php echo $mem_cardRow['item4name'] ?></h4>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
		                        </div>



<?php 
}
?>
		                       	
		                        
		                        
		                    </div>
		                    <!-- control arrows -->
		                    <div class="prev">
		                        <div class="arrow_left"></div>
		                        <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> -->
		                    </div>
		                    <div class="next">
		                        <div class="arrow_right"></div>
		                        <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> -->
		                    </div>
		                </div>
		            </div>
		            <div class="radar_box">
	                	<div id="radar_wrapper">
					        <canvas id="chartRadar2" width="300" height="300"></canvas>
					    </div>
	                </div>

		            <a href="forum_article_publish.php#publish_r"><div class="nextStepBtn_d">
		            	    <div id="nextStep" class="btn_b nextStep">確定</div>
		            	</div></a>
		        </div>
		    </section>
				<div class="publish_l">
					<div class="publish_card"  id="add_card">
						<div class="plus_wrap">
							<div class="plus"></div>
						</div>
					</div>
				</div>
				<div class="publish_r" id="publish_r">
					<form action="php/add_article.php">
						<input type="text" name="article_title" placeholder="請輸入標題">
						<textarea placeholder="請輸入內容分享(上限250字)" name="article_text"></textarea>
						<input type="hidden" name="cardNO" id="cardNo">
						<button type="submit" class="btn_l">發表文章</button> 
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
	<script src="js/Chart.js"></script>
	<script src="js/article_poblish_radar.js"></script>

	<script type="text/javascript" src="js/article_poblish.js"></script>

</body>
</html>