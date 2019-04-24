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
				
				<div class="hot_forum_box hot_forum_box1 article_hot_forum_box">

					<div class="card card1 article_card">
						<img class="knot" src="images/red_knot.png">
						<div class="front">
							<img class="badge" src="images/badge.png">
							<h3 class="card_name">舒筋活骨湯</h3>
							<div class="card_item_box">
								<div class="card_item card_item1">
									<div class="card_item_image">
										<img src="images/card_item.png">
									</div>
									<h4 class="card_item_name">紅色鼻屎</h4>
								</div>
								<div class="card_item card_item2">
									<div class="card_item_image">
										<img src="images/card_item.png">
									</div>
									<h4 class="card_item_name">紅地瓜</h4>
								</div>
								<div class="card_item card_item3">
									<div class="card_item_image">
										<img src="images/card_item.png">
									</div>
									<h4 class="card_item_name">紅色鼻屎</h4>
								</div>
								<div class="card_item card_item4">
									<div class="card_item_image">
										<img src="images/card_item.png">
									</div>
									<h4 class="card_item_name">枸杞</h4>
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
						<h3>舒筋活骨湯</h3>
						<div class="article_info_radar">
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
								<h4 class="user_name">煎餅</h4>
							</div>
							<h3 class="forum_title">我超愛湯先生的環境</h3>
							<div class="card_item_mobile">
								<span class="kind1">枸杞</span>
								<span class="kind1">蒜頭</span>
								<span class="kind2">西瓜</span>
								<span class="kind2">紅色鼻屎</span>
							</div>
							<p class="time time_inner">2019-03-27</p>
							
							<div class="hot_forum_content">
								<div class="content_l">
									<p class="article">我第一次造訪，覺得太棒了，戶外的流水聲配合著溫泉泡湯，好舒服，小孩泡久了就自己到屋子內梳洗躺在床上休息看電視，我跟老公就有了單獨的兩人時間，聊聊話，泡泡湯，空氣清新，當天回家身心靈的壓力完全釋放。</p>
								</div>
								<div class="content_r">
									<div id="radar_wrapper">
									    <canvas id="chartRadar" width="300" height="300"></canvas>
									</div>
								</div>

							</div>
							<div class="hot_forum_data forum_data_inner">
								<p class="like">
									<img class="heart_icon solid_heart" src="images/solid_heart.png">
								</p>
								<p>27k</p>
								<p class="msg_count">
									<a href="#publish_wrap"><img src="images/msg_count_icon.png"></a>
								</p>
								<p>900+</p>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="msg_wrap">
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
							<img src="images/lulu_photo.jpg">
						</div>
						<div class="user_name">
							尖尖
						</div>
					</div>
					<div class="msg_r">
						<p>一家四人入住貴賓房，價價位的等級，除了房內的泡湯外，沒有其他戶外溫泉池的設施。</p>
						<div class="time">
							2019-03-31
						</div>
					</div>
					<div class="like">
						<img class="heart_icon hollow_heart" src="images/hollow_heart.png">
						<p>25</p>
					</div>
				</div>
				
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
							<img src="images/user_photo.png">
						</div>
						<div class="user_name">
							尖尖
						</div>
					</div>
					<div class="msg_r">
						<p>一家四人入住貴賓房</p>
						<div class="time">
							2019-03-31
						</div>
					</div>
					<div class="like">
						<img class="heart_icon hollow_heart" src="images/hollow_heart.png">
						<p>25</p>
					</div>
				</div>


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
							<img src="images/user_photo.png">
						</div>
						<div class="user_name">
							尖尖
						</div>
					</div>
					<div class="msg_r">
						<p>一家四人入住貴賓房，因為有兩池可泡湯，所以很舒適方便，只是房內的廁所及浴室偏小。早餐過於簡單，不太符合房價價位的等級，除了房內的泡湯外，沒有其他戶外溫泉池的設施。</p>
						<div class="time">
							2019-03-31
						</div>
					</div>
					<div class="like">
						<img class="heart_icon hollow_heart" src="images/hollow_heart.png">
						<p>25</p>
					</div>
				</div>



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
							<img src="images/user_photo.png">
						</div>
						<div class="user_name">
							尖尖
						</div>
					</div>
					<div class="msg_r">
						<p>一家四人入住貴賓房，因為有兩池可泡湯，所以很舒適方便，只是房內的廁所及浴室偏小。早餐過於簡單，不太符合房價價位的等級，除了房內的泡湯外，沒有其他戶外溫泉池的設施。</p>
						<div class="time">
							2019-03-31
						</div>
					</div>
					<div class="like">
						<img class="heart_icon hollow_heart" src="images/hollow_heart.png">
						<p>25</p>
					</div>
				</div>
				
			</div>
			<img src="images/decoration1.png">
			
			<div class="publish_wrap" id="publish_wrap">
				<div class="msg_box">
					<div class="msg_l publish_msg_l">
						<div class="user_photo">
							<img src="images/user_photo.png">
						</div>
						<div class="user_name">
							尖尖
						</div>
					</div>
					<div class="msg_r publish_msg_r">
						<form action="#">
							<textarea placeholder="你的留言..." name="msg"></textarea>
							<input type="submit" name="submit" value="留言">
						</form>
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