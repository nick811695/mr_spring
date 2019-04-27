<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>湯先生 Mr.Spring</title>
    <script src="node_modules/gsap/src/minified/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/pixi.js/3.0.7/pixi.js"></script>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/share.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/hot_forum.css">
    <link rel="stylesheet" href="css/firstPage.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<style>
    /* 全區域 */
    * {
        /* outline: 2px solid red; */
    }
</style>

<body>
    <!-- <h1>首頁請用這支</h1> -->

    <!-- 燈箱：登入 -->
    <div id="lightBox" style="display:none; z-index: 1000;">
        <div class="table_wrap">

            <figure class="Login_pic">
                <img src="images/Logo_browen.svg" alt="湯先生">
            </figure>

            <p class="Login_title">會員登入</p>

            <table id="tableLogin">

                <tr>

                    <td>
                        <p>帳號</p>
                        <input type="text" name="memId" id="memId" placeholder="example@email.com">
                    </td>
                </tr>
                <tr>
                    <!-- <td></td> -->
                    <td>
                        <p>密碼</p>
                        <input type="password" name="memPsw" id="memPsw" placeholder="******">
                    </td>

                </tr>

                <tr>
                    <!-- <td colspan="2" align="center">
                            
                        </td> -->
                </tr>
            </table>
            <div class="btn_wrap">
                <button class="btn_s" id="btnLogin" value="登入" style="color:rgb(112, 95, 69);">
                    <span>登入</span>
                </button>
            </div>
            <button class="btn_s" id="btnLoginCancel" value="取消">
                <div class="x_x">
                    <span class="top"></span>
                    <span class="bottom"></span>
                </div>
            </button>
            <div class="center">
                <button class="first_time">還沒註冊帳號?</button>
            </div>
        </div>
    </div>




    <!-- 導覽列 -->
    <header>
        <nav id="nav_bar">
            <img id="LoginHere" src="images/account.png" alt="會員登入">
            <svg width="800" height="0" viewBox="0 0 800 230">
                <path fill="none" d="0 96%, 100% 96%, 100% 100%, 0% 100%" />
            </svg>
            <ul id="banner">
                <a class="flag" href="custom.html">
                    <h2>客製湯頭</h2>
                </a>
                <a class="flag" href="reservation.html">
                    <h2>預約訂房</h2>
                </a>
                <a class="flag" href="index.html">
                    <h1> <img id="mrSpringLogo_w" style="width:118.7px; " src="images/mrSpringLogo_W.svg" alt="湯先生">
                        <img id="mrSpringLogo" style="width:110px;" src="images/mrSpringLogo.svg" alt="湯先生"></h1>
                </a>
                <a class="flag" href="forum.html">
                    <h2>討論の區</h2>
                </a>
                <a class="flag" href="member.html">
                    <h2>會員専區</h2>
                </a>
            </ul>
        </nav>

        <div id="nav_wrapper">
            <h1 id="mt_logo">
                <a href="index.html"><img src="images/logoHorizon.svg" alt="Mr.Spring Logo"></a>
            </h1>
            <div class="nav_icon_wrap">
                <!-- <a href="javascript:;"><img src="object/most_love.png" alt="most_love" style="display:none;"></a>
        <a href="javascript:;"><img src="object/shop_cart.png" alt="shop_cart" style="display:none;"></a> -->
                <span id="memName">&nbsp;</span>
                <img id="spanLogin" src="images/account.png" alt="member">
            </div>

            <div class="button_container" id="toggle">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </div>
        </div>

        <div class="overlay" id="overlay">

            <nav class="overlay-menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="custom.html">客製湯頭</a></li>
                    <li><a href="reservation.html">預約訂房</a></li>
                    <li><a href="forum.html">討論の區</a></li>
                    <li><a href="member.html">會員専區</a></li>
                </ul>
            </nav>
        </div>


        <script>
            $("#toggle").click(function() {
                $(this).toggleClass("action");
                $("#overlay").toggleClass("open");
            });
        </script>

    </header>

    <!-- 小遊戲連結 -->
    <a class="getCoupon" href="game.html">
        <div id="wave_for_coupon">
            <div class="little_wave">
                <img class="" src="images/wave2.svg" alt="">
                <img src="images/wave2.svg" alt="">
                <img src="images/wave2.svg" alt="">
            </div>
        </div>

        <img id="peach" src="images/getCoupon2.svg" alt="優惠券小遊戲">
    </a>


    <!-- 第一屏 -->
    <div class="mt_first_page">
        <!-- <div id="kasumi_top_container"></div> -->
        <div class="mt_bg_wrap">
            <div class="mt_cloud">
                <div class="cloud_large">
                    <img src="images/cloud_large.png" alt="cloud">
                    <img src="images/cloud_large.png" alt="cloud">
                    <img src="images/cloud_large.png" alt="cloud">
                </div>
                <!-- <div class="bg_mt">
                    <img src="images/fjMountain.png" alt="fujiMountain">
                    <img src="images/first_page_trees.png" alt="trees">
                </div> -->
                <div id="mt_water">
                    <img id="fj" src="images/fjMountain.png" alt="fujiMountain">

                    <div id="water_color_change"></div>
                    <div id="water_color_nochange"></div>
                    <div class="wrap" style="position:relative;">
                        <section class="introduce">

                            <div class="content">
                                <div class="content_frame_wrap">
                                    <div id="content_frame" style="opacity: 0;">
                                        <img id="text_bubble" src="images/texture01.png" alt="湯頭介紹">
                                        <article class="sup_info">
                                            <figure id="spring_herb">
                                                <h3 id="spring_name">舒筋緩骨湯</h3>
                                                <a href=""><img class="intro_pic_small" src="images/herb01.svg" alt="湯頭介紹"></a>
                                                <a href=""><img class="intro_pic_small" src="images/herb02.svg" alt="湯頭介紹"></a>
                                                <a href=""><img class="intro_pic_small" src="images/herb03.svg" alt="湯頭介紹"></a>
                                            </figure>
                                            <p class="paragraph">
                                                【療效】山茱萸理氣解鬱，活血散瘀，和血調經。菊花治胃氣痛、新久風痺、吐血、月經不調、赤白帶、赤白痢、乳癰腫毒、跌打損傷；薰衣草：和中，治肝氣犯胃。
                                            </p>
                                            </br>
                                            <p class="paragraph">【配方】山茱萸、菊花、薰衣草。</p>
                                            <div class="custom_button">
                                                <center>
                                                    <a href="custom.html" class="btn_s" style="color:#ceae81;">馬上客製</a>
                                                    <a href="#second_page" class="btn_s" style="color:#ceae81;">我要諮詢</a>

                                                </center>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="herb">
                                    <figure class="herb_cross">
                                        <h3 class="hurb_name">舒筋緩骨</h3>
                                        <img class="cross" src="images/herbCross01.png" alt="舒筋緩骨">
                                        <img class="sepia_cross" src="images/herbCross01_red.png" alt="舒筋緩骨">
                                    </figure>

                                    <figure id="herb_cross2">
                                        <h3 class="hurb_name">安定心神</h3>
                                        <img class="cross" src="images/herbCross02.png" alt="安定心神">
                                        <img class="sepia_cross" src="images/herbCross02_green.png" alt="安定心神">
                                    </figure>
                                    <figure class="herb_cross">
                                        <h3 class="hurb_name">養顏美容</h3>
                                        <img class="cross" src="images/herbCross03.png" alt="養顏美容">
                                        <img class="sepia_cross" src="images/herbCross03_bl02.png" alt="養顏美容">
                                    </figure>
                                </div>

                            </div>
                        </section>
                    </div>
                    <div class="monkey_animation">

                        <div id="monkey_wrap">
                            <div class="sk_wrap">
                                <div class="little_smoke">
                                    <div class="sk"></div>
                                    <div class="sk"></div>
                                    <div class="sk"></div>
                                </div>
                            </div>
                            <div id="wave01">
                                <div class="little_wave">
                                    <img src="images/wave1.svg" alt="">
                                    <img src="images/wave1.svg" alt="">
                                    <img src="images/wave1.svg" alt="">
                                </div>
                            </div>

                            <div id="wave02">
                                <div class="little_wave">
                                    <img src="images/wave2.svg" alt="">
                                    <img src="images/wave2.svg" alt="">
                                    <img src="images/wave2.svg" alt="">
                                </div>
                            </div>
                            <img id="slogon02" src="images/slogon2.svg" alt="來約泡湯吧!">
                            <img id="slogon01" src="images/slogon01.svg" alt="專業客製湯屋">
                            <img id="monkeyFace" src="images/monkeyFace01.svg" alt="">
                            <img id="mr_spring_for_firstpage" src="images/monkey01.svg" alt="湯先生">
                            <img id="monkeyEyes" src="images/monkeyEyesLemon.svg" alt="">


                            <div class="note" style="opacity: 0;">
                                <span>z</span>
                                <span>Z</span>
                                <span>z</span>
                                <span>Z</span>
                                <span>z</span>
                            </div>
                            <div class="sk_wrap02">
                                <div class="little_smoke">
                                    <div class="sk"></div>
                                    <div class="sk"></div>
                                    <div class="sk"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>


    <!-- 第二屏 -->
    <div id="second_page">
        <div class="my_second_page">
            <!-- 結果 -->
            <div class="showshower" id="showshower">
                <div class="col-12 col-md-8 an_shower_info">
                    <div class="shower_infoTitle">
                        <p>專屬推薦</p>
                        <p>根據諮詢的結果您對<span>安定心神</span>的需求最大，其次是<span>養顏美容</span>最後是<span>舒筋活骨</span>，因此我們為您推薦:</p>
                    </div>
                    <div class="showerMedicine">
                        <div class="an_MedicinePicWrap">
                            <img src="images\itemPics\alchecked\item2-1.png" alt="檸檬">
                            <p>檸檬</p>
                            <p>可預防和治療高血壓和心肌梗塞，檸檬酸有收縮、增固毛細血管。</p>
                        </div>
                        <div class="an_MedicinePicWrap">
                            <img src="images\itemPics\alchecked\item3-2.png" alt="八角">
                            <p>八角</p>
                            <p>促進消化液分泌，增加胃腸蠕動，有助於緩解痙攣、減輕疼痛。</p>
                        </div>
                        <div class="an_MedicinePicWrap">
                            <img src="images\itemPics\alchecked\item1-1.png" alt="山茱萸">
                            <p>山茱萸</p>
                            <p>此湯對血氣皆虛、精神不振有很好療效，可補肝腎，滋陰明目。</p>
                        </div>
                    </div>
                    <div class="an_Medicine">
                        <div class="Medicine_btn_s">
                            <a href="index.html#second_page" class="Medicine_btmLink">重新測驗</a>
                        </div>
                        <div class="Medicine_btn_s">
                            <a href="show.html" class="Medicine_btmLink">來去客製</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 搗藥桌子 -->
            <div class="an_table">
                <!-- 搗藥猴子 -->
                <img class="monkeyMedPic" src="images\monkeyMi.gif" alt="搗藥猴子">
            </div>
            <div class="an_monkeyMedicine">
                <!-- 猴子櫃子 -->
                <div class="col-lg-5 col-12 an_monkeyCabinet">
                    <div class="an_cabinet">
                        <!-- 抽屜一列 -->
                        <div class="drawerWrap">
                            <div class="drawer">
                                <img src="images\close_drawer.png" alt="抽屜">
                                <div class="extend"></div>
                            </div>
                            <div class="drawer">
                                <img src="images\close_drawer.png" alt="抽屜">
                                <div class="extend"></div>
                            </div>
                            <div class="drawer">
                                <img src="images\close_drawer.png" alt="抽屜">
                                <div class="extend"></div>
                            </div>
                        </div>
                        <div class="drawerWrap">
                            <div class="drawer">
                                <img src="images\close_drawer.png" alt="抽屜">
                                <div class="extend"></div>
                            </div>
                            <div class="drawer">
                                <img src="images\close_drawer.png" alt="抽屜">
                                <div class="extend"></div>
                            </div>
                            <div class="drawer">
                                <img src="images\close_drawer.png" alt="抽屜">
                                <div class="extend"></div>
                            </div>
                        </div>
                        <div class="drawerWrap">
                            <div class="drawer">
                                <img src="images\close_drawer.png" alt="抽屜">
                                <div class="extend"></div>
                            </div>
                            <div class="drawer">
                                <img src="images\close_drawer.png" alt="抽屜">
                                <div class="extend"></div>
                            </div>
                            <div class="drawer">
                                <img src="images\close_drawer.png" alt="抽屜">
                                <div class="extend"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--藥籤諮詢 -->
                <div class="col-lg-7 col-12 an_prescription " id="an_prescription">
                    <!-- 第二屏標題 -->
                    <div class="an_titleMedicine">
                        <div class="titleSquareMedicine">
                            <h2>湯先生抓藥</h2>
                        </div>
                    </div>
                    <div class="an_rescriptionWrap">
                        <!-- 進度表 -->
                        <div class="an_schedule">
                            <div class="an_circle">1</div>
                            <div class="an_scheduleLine"></div>
                            <div class="an_circle1" id="an_circle">2</div>
                            <div class="an_scheduleLine"></div>
                            <div class="an_circle1" id="an_circle">3</div>
                            <div class="an_scheduleLine"></div>
                            <div class="an_circle1" id="an_circle">4</div>
                            <div class="an_scheduleLine"></div>
                            <div class="an_circle1" id="an_circle">5</div>
                            <div class="an_scheduleLine"></div>
                            <div class="an_circle1" id="an_circle">6</div>
                        </div>
                        <!-- 諮詢問題 -->
                        <div class="an_rescriptionText">
                            <p id="qn">Q1</p>
                            <p id="qus">最近的你，是否總是感到胸悶或容易偏頭痛呢?</p>
                        </div>
                        <!-- 諮詢問題答案按鈕 -->
                        <div class="an_anser_wrap">
                            <div class="an_anser">
                                <div class="btn_a" id="btn_alltime" onclick="f_q('btn_alltime')">
                                    持續好幾周
                                </div>
                            </div>
                            <div class="an_anser">
                                <div class="btn_a" id="btn_sometime" onclick="f_q('btn_sometime')">
                                    每月兩三次
                                </div>
                            </div>
                            <div class="an_anser">
                                <div class="btn_a" id="btn_never" onclick="f_q('btn_never')">
                                    從來沒有過
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 第三屏 -->

    <div class="third_page_wrap">


        <div class="third_page">

            <div class="cloud_large">
                <img src="images/cloud_l2.png" alt="cloud">
                <img src="images/cloud_l2.png" alt="cloud">
                <img src="images/cloud_l2.png" alt="cloud">
            </div>

            <div class="cloud_large">
                <img src="images/cloud_large.png" alt="cloud">
                <img src="images/cloud_large.png" alt="cloud">
                <img src="images/cloud_large.png" alt="cloud">
            </div>


            <div class="wrap forum_wrap">
                <div class="mt_title">
                    <div class="titleSquare">
                        <h2>熱門湯牌</h2>
                    </div>
                </div>
                <div class="hot_forum_wrap">
                    <img src="images/prev.png" id="prev">
                    <img src="images/next.png" id="next">

                    <div class="hot_forum_box hot_forum_box1">

                        <div class="card card1 zoom_in">
                            <img class="knot" src="images/red_knot.png">
                            <div class="front">
                                <img class="badge" src="images/badge.png">
                                <h3 class="card_name">舒筋活骨湯1</h3>
                                <div class="card_item_box">
                                    <div class="card_item card_item1">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">紅色鼻屎</h4>
                                    </div>
                                    <div class="card_item card_item2">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">紅地瓜</h4>
                                    </div>
                                    <div class="card_item card_item3">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">紅色鼻屎</h4>
                                    </div>
                                    <div class="card_item card_item4">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">枸杞</h4>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="card_btn_box">
                                    <a class="btn_s" href="">收藏它</a>
                                    <a class="btn_s" href="">去客製</a>
                                </div>
                            </div>
                        </div>

                        <div class="hot_forum_hidden">
                            <div class="hot_forum">
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
                                <h3 class="forum_title"> 我超愛湯先生的環境
                                </h3>
                                <div class="hot_forum_content">
                                    <div class="content_l">

                                        <div class="hot_forum_data">
                                            <p class="time">2019-03-27</p>
                                            <p class="like">
                                                <img src="images/solid_heart.png">
                                            </p>
                                            <p>27k</p>
                                            <p class="msg_count">
                                                <img src="images/msg_count_icon.png">
                                            </p>
                                            <p>900+</p>
                                            <div class="clear"></div>
                                        </div>
                                        <p class="article">我第一次造訪，覺得太棒了，戶外的流水聲配合著溫泉泡湯，好舒服，小孩泡久了就自己到屋子內梳洗躺在床上休息看電視</p>
                                    </div>
                                    <div class="content_r">
                                        <div id="radar_wrapper">
                                            <canvas id="chartRadar" width="300" height="300"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <a href="forum_article.html" class="btn_s">查看更多</a>
                            </div>
                        </div>
                    </div>

                    <div class="hot_forum_box hot_forum_box2">

                        <div class="card card1 zoom_out">
                            <img class="knot" src="images/red_knot.png">
                            <div class="front">
                                <img class="badge" src="images/badge.png">
                                <h3 class="card_name">舒筋活骨湯2</h3>
                                <div class="card_item_box">
                                    <div class="card_item card_item1">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">紅色鼻屎</h4>
                                    </div>
                                    <div class="card_item card_item2">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">紅地瓜</h4>
                                    </div>
                                    <div class="card_item card_item3">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">紅色鼻屎</h4>
                                    </div>
                                    <div class="card_item card_item4">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">枸杞</h4>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="card_btn_box">
                                    <a class="btn_s" href="">收藏它</a>
                                    <a class="btn_s" href="">去客製</a>
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
                                    <h4 class="user_name">煎餅</h4>
                                </div>
                                <h3 class="forum_title"> 我超愛湯先生的環境
                                </h3>
                                <div class="hot_forum_content">
                                    <div class="content_l">

                                        <div class="hot_forum_data">
                                            <p class="time">2019-03-27</p>
                                            <p class="like">
                                                <img src="images/solid_heart.png">
                                            </p>
                                            <p>27k</p>
                                            <p class="msg_count">
                                                <img src="images/msg_count_icon.png">
                                            </p>
                                            <p>900+</p>
                                            <div class="clear"></div>
                                        </div>
                                        <p class="article">
                                            我第一次造訪，覺得太棒了，戶外的流水聲配合著溫泉泡湯，好舒服，小孩泡久了就自己到屋子內梳洗躺在床上休息看電視，我跟老公就有了單獨的兩人時間，聊聊話，泡泡湯，空氣清新，當天回家身心靈的壓力完全釋放。
                                        </p>
                                    </div>
                                    <div class="content_r">
                                        <div id="radar_wrapper">
                                            <canvas id="chartRadar2" width="300" height="300"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <a href="forum_article.html" class="btn_s">查看更多</a>
                            </div>
                        </div>
                    </div>

                    <div class="hot_forum_box hot_forum_box3">

                        <div class="card card1 zoom_out">
                            <img class="knot" src="images/red_knot.png">
                            <div class="front">
                                <img class="badge" src="images/badge.png">
                                <h3 class="card_name">舒筋活骨湯3 </h3>
                                <div class="card_item_box">
                                    <div class="card_item card_item1">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">紅色鼻屎</h4>
                                    </div>
                                    <div class="card_item card_item2">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">紅地瓜</h4>
                                    </div>
                                    <div class="card_item card_item3">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">紅色鼻屎</h4>
                                    </div>
                                    <div class="card_item card_item4">
                                        <div class="card_item_image">
                                            <img src="images/item3_3.png">
                                        </div>
                                        <h4 class="card_item_name">枸杞</h4>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="card_btn_box">
                                    <a class="btn_s" href="">收藏它</a>
                                    <a class="btn_s" href="">去客製</a>
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
                                    <h4 class="user_name">煎餅</h4>
                                </div>
                                <h3 class="forum_title"> 我超愛湯先生的環境
                                </h3>
                                <div class="hot_forum_content">
                                    <div class="content_l">

                                        <div class="hot_forum_data">
                                            <p class="time">2019-03-27</p>
                                            <p class="like">
                                                <img src="images/solid_heart.png">
                                            </p>
                                            <p>27k</p>
                                            <p class="msg_count">
                                                <img src="images/msg_count_icon.png">
                                            </p>
                                            <p>900+</p>
                                            <div class="clear"></div>
                                        </div>
                                        <p class="article">
                                            我第一次造訪，覺得太棒了，戶外的流水聲配合著溫泉泡湯，好舒服，小孩泡久了就自己到屋子內梳洗躺在床上休息看電視，我跟老公就有了單獨的兩人時間，聊聊話，泡泡湯，空氣清新，當天回家身心靈的壓力完全釋放。
                                        </p>
                                    </div>
                                    <div class="content_r">
                                        <div id="radar_wrapper">
                                            <canvas id="chartRadar3" width="300" height="300"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <a href="forum_article.html" class="btn_s">查看更多</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- 第四屏 -->
    <div class="my_fourth_page">
        <div class="an_map">
            <!-- 左半邊 -->
            <div class="col-12 col-md-7 mapWrap">
                <!-- 地圖選單群 -->
                <div class="titleWrap">
                    <!-- 地圖標題 -->
                    <div class="an_title">
                        <div class="titleSquare">
                            <h2>尋找湯先生</h2>
                        </div>
                    </div>
                    <!-- 各分店 -->
                    <div class="an_roomtype">
                        <div class="an_roomtypeIcon">
                            <div class="rommtypeIcon01" id="sopMap01" onclick="showInfo(this)">
                                <!-- <img src="img\icon01.png" alt="中央店"> -->
                                <h3 class="branch">中央店</h3>
                            </div>
                            <div class="rommtypeIcon02" id="sopMap02" onclick="showInfo(this)">
                                <!-- <img src="img\icon01.png" alt="中央店"> -->
                                <h3 class="branch">桃園店</h3>
                            </div>
                            <div class="rommtypeIcon03" id="sopMap03" onclick="showInfo(this)">
                                <!-- <img src="img\icon01.png" alt="中央店"> -->
                                <h3 class="branch">北投店</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 店家資訊 -->
                <div class="room_info_mobile">
                    <img src="images\map-placeholder.png" alt="座標圖">
                    <p id="adress_m">桃園市中壢區300號</p>
                    <img src="images\phone.png" alt="電話">
                    <p id="phone_m">03-3258778</p>
                </div>
                <!-- 雲地圖 -->
                <div class="cloud_map">
                    <!-- <iframe width="100%" height="500px" frameborder="0" style="border:0" zoom="2"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1808.4819060454072!2d121.18812335820543!3d24.967345827554638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346823eb2609f805%3A0xa6a73a9ed1bee882!2z5Lit5aSu5aSn5a245b6M6ZaA5qmf6LuK5YGc6LuK5aC0!5e0!3m2!1szh-TW!2stw!4v1554538344894!5m2!1szh-TW!2stw">
                    </iframe> -->
                    <div id="mapBoard"></div>
                </div>
            </div>
            <!--右半邊-->
            <div class="col-12 col-md-5 roomPicWrap">
                <!-- 分店幻燈片 -->
                <div class="slideshow-container" style="overflow: hidden;">
                    <div class="mySlides fade" style="position: relative;">
                        <img class="an_roompic" id="an_roompic01" src="images\01.PNG" width='100%'>
                        <div class="text">中央店</div>
                    </div>

                    <div class="mySlides fade" style="position: relative;">
                        <img class="an_roompic" src="images\02.PNG" width='100%'>
                        <div class="text">桃園店</div>
                    </div>

                    <div class="mySlides fade" style="position: relative;">
                        <img class="an_roompic" src="images\03.PNG" width='100%'>
                        <div class="text">北投店</div>
                    </div>
                    <div class="dotWrap">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                </div>
                <!-- 桌機分店資訊 -->
                <div class="room_info">
                    <img src="images\map-placeholder.png" alt="座標圖">
                    <p id="adress_c">桃園市中壢區300號</p>
                    <img src="images\phone.png" alt="電話">
                    <p id="phone_c">03-3258778</p>
                </div>
                <!-- 手機幻燈片左右切換 -->
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
            </div>
        </div>
        <div class="an_roomc">
            <button class="btn_s">
                立即訂房
            </button>
        </div>
    </div>


    <!-- 猴子機器人 -->
    <div class="chatbot">
        <div class="monkeyBotWrap">
            <img class="monkeyBot" id="monkeyBot" src="images\monkeyBot.png" alt="猴子機器人">
        </div>
    </div>
    <div class="chatbotTextWrap" id="chatbotTextWrap">
        <!-- 叉叉 -->
        <div id="close_btn">
            <img src="images\X.png" alt="關閉鍵">
        </div>
        <!-- <div class="botTitle"> -->
        <h2>湯先生客服</h2>
        <!-- </div> -->
        <!-- 對話框 -->
        <div id="chatBot-content" class="clearfix">
            <div id="chatBot-container" class="clearfix">
                <p id="chatBot-content-A" class="chatBot-content-A">HI! 很高興為您服務，您可以點擊下方關鍵或是直接輸入詢問內容!</p>
                <div style="clear:both"></div>
            </div>
        </div>

        <ul class="chatBot-keyword">
            <li>營業時間</li>
            <li>藥草</li>
            <li>功效</li>
            <li>分店</li>
            <li>優惠折扣</li>
            <li>房型有哪些</li>
            <li>客製要到哪客製</li>
            <div class="clearfix"></div>
        </ul>
        <div class="chatBot-text-Wrap">
            <button type="submit" id="chatBot-search" class="nextBTN">送出</button>
            <input type="text" class="chatBot-text" id="chatBot-text" placeholder="輸入你的問題" name="userkey">
            <div id="UserText"></div>
        </div>
    </div>

    <script src="js/cloudGo.js"></script>
    <script src="js/kasumi.js"></script>
    <script src="js/consult.js"></script>
    <script src="js/header.js"></script>
    <script src="js/login.js"></script>
    <script src="js/map.js"></script>
    <script src="js/slide.js"></script>
    <script src="js/Chart.js"></script>
    <script src="js/forum.js"></script>
    <script src="js/radar.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrMA9a22m_ft2x_W8UDhDpfI2GS7k54kg&callback=initMap">
    </script>
    <script src="js/chatbot.js"></script>
    <!-- <script src="js/waveGo.js"></script> -->
</body>

</html>