<?php 

try{
  require_once("php/connect.php");
  // $sql = "select * from products where psn = :psn";
  // $products = $pdo->prepare($sql);
  // $products->bindValue(":psn", $psn);
  // $products->execute();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/forum.css">
	<link rel="stylesheet" type="text/css" href="css/share.css">
	<link rel="stylesheet" type="text/css" href="css/card.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/slick.css">
</head>
<style type="text/css">
	
	body{
		/*height: 100vh;*/
	}
</style>
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
		                       	<div class="cards">
		                            <div class="card card1">
										<img class="knot" src="images/red_knot.png">
										<div class="front">
											<img class="badge" src="images/badge.png">
											<h3 class="card_name">舒筋活骨湯1</h3>
											<div class="card_item_box">
												<div class="card_item card_item1">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name1">紅色鼻屎</h4>
												</div>
												<div class="card_item card_item2">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name2">紅地瓜</h4>
												</div>
												<div class="card_item card_item3">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name3">紅色鼻屎</h4>
												</div>
												<div class="card_item card_item4">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name4">枸杞</h4>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
		                        </div>
		                        <div class="cards">
		                            <div class="card card1">
										<img class="knot" src="images/red_knot.png">
										<div class="front">
											<img class="badge" src="images/badge.png">
											<h3 class="card_name">舒筋活骨湯1</h3>
											<div class="card_item_box">
												<div class="card_item card_item1">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name1">紅色鼻屎</h4>
												</div>
												<div class="card_item card_item2">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name2">紅地瓜</h4>
												</div>
												<div class="card_item card_item3">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name3">紅色鼻屎</h4>
												</div>
												<div class="card_item card_item4">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name4">枸杞</h4>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
		                        </div>
		                        <div class="cards">
		                            <div class="card card1">
										<img class="knot" src="images/red_knot.png">
										<div class="front">
											<img class="badge" src="images/badge.png">
											<h3 class="card_name">舒筋活骨湯1</h3>
											<div class="card_item_box">
												<div class="card_item card_item1">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name1">紅色鼻屎</h4>
												</div>
												<div class="card_item card_item2">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name2">紅地瓜</h4>
												</div>
												<div class="card_item card_item3">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name3">紅色鼻屎</h4>
												</div>
												<div class="card_item card_item4">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name4">枸杞</h4>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
		                        </div>
		                        
		                        <div class="cards">
		                            <div class="card card1">
										<img class="knot" src="images/red_knot.png">
										<div class="front">
											<img class="badge" src="images/badge.png">
											<h3 class="card_name">舒筋活骨湯1</h3>
											<div class="card_item_box">
												<div class="card_item card_item1">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name1">紅色鼻屎</h4>
												</div>
												<div class="card_item card_item2">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name2">紅地瓜</h4>
												</div>
												<div class="card_item card_item3">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name3">紅色鼻屎</h4>
												</div>
												<div class="card_item card_item4">
													<div class="card_item_image">
														<img src="images/card_item.png">
													</div>
													<h4 class="card_item_name card_item_name4">枸杞</h4>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
		                        </div>
		                        
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
						<button type="submit" class="btn_l">發表文章</button> 
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
	<script src="js/Chart.js"></script>
	<script src="js/hot_forum_radar.js"></script>

	<script type="text/javascript" src="js/article_poblish.js"></script>

</body>
</html>