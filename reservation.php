<?php
    ob_start();
    session_start();

    // $_SESSION["memNo"] = 1;
    // unset($_SESSION["memNo"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/share.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/forum.css">
    <link rel="stylesheet" type="text/css" href="css/card.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/reservation.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
</head>

<body>
    <!-- <header class="mobile_display">
        <div class="nav_fabric">
            <img src="images/navBar.png" alt="navBar">
        </div>
        <nav class="main_menu">
            <a href="custom.html">
                <h2>
                    客製湯頭
                </h2>
            </a>
            <a href="reservation.html">
                <h2 style="color:#fff;">
                    預約訂房
                </h2>
            </a>
            <a href="index.html">
                <h2 style="margin-top:0px;">
                    <img style="width:100px;" src="images/mrSpringLogo.png" alt="">
                </h2>
            </a>
            <a href="forum.html">
                <h2>
                    討論の區
                </h2>
            </a>
            <a href="member.html">
                <h2>
                    會員専區
                </h2>
            </a>

        </nav>
    </header> -->
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
    <div class="reservationWindow_d">
        <section id="smallLightBox_wrapper">
            <div id="smallLightBox">
                <!-- <div id="smallLightboxToggle"></div> -->
                <h3>還沒選擇日期哦!!!</h3>
                <div class="nextStepBtn_d">
                    <div class="btn_b nextStep">確定</div>
                </div>
            </div>
        </section>
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
                    <h2>請選擇要使用的湯牌</h2>
                    <div id="lightbox_filter_mask"></div>
                    <div class="lightbox_filter">
                        <img src="images/filter.png">
                        <select id="lightbox_filter_select">
                            <option value="Choice 1">熱門湯牌</option>
                            <option value="Choice 2">自己製作</option>
                            <option value="Choice 3">討論區收藏</option>
                        </select>
                    </div>
                    <label for="lightbox_radar" id="lightbox_radar_btn"><img src="images/info_icon.png"></label>
                    
                    <div class="select-box">
                        <label for="select-box1" class="label select-box1"><span class="label-desc">熱門湯牌</span> </label>
                        <select id="select-box1" class="select">
                            <option value="Choice 1">熱門湯牌</option>
                            <option value="Choice 2">自己製作</option>
                            <option value="Choice 3">討論區收藏</option>
                        </select>  
                    </div>
                    
                    <div class="chooseCardArea_d">
                        <div class="responsive">
                            <!-- <div class="cards">
                                <img src="http://placehold.it/224x420" alt="" />
                            </div>
                            <div class="cards">
                                <img src="http://placehold.it/224x420" alt="" />
                            </div>
                            <div class="cards">
                                <img src="http://placehold.it/224x420" alt="" />
                            </div>
                            <div class="cards">
                                <img src="http://placehold.it/224x420" alt="" />
                            </div>
                            <div class="cards">
                                <img src="http://placehold.it/224x420" alt="" />
                            </div>
                            <div class="cards">
                                <img src="http://placehold.it/224x420" alt="" />
                            </div>
                            <div class="cards">
                                <img src="http://placehold.it/224x420" alt="" />
                            </div>
                            <div class="cards">
                                <img src="http://placehold.it/224x420" alt="" />
                            </div> -->
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
                <!-- <div class="cardPrice_d">
                    <span>湯牌價格</span>
                    <span>NT$<span id="cardPriceText">1200</span></span>
                </div> -->
                <!-- <a href="forum_article_publish.php#publish_r"> -->
                    <div class="nextStepBtn_d">
                        <div class="btn_b nextStep">確定</div>
                    </div>
                <!-- </a> -->
            </div>
        </section>
        <div class="reservationContainer_d">
            <div class="page_d first_page">
                <div class="backgroundImgCloud mobile_display">
                    <img src="images/cloud5.png" alt="">
                    <img src="images/cloud8.png" alt="">
                    <img src="images/cloud_large.png" alt="">
                    <img src="images/cloud4.png" alt="">
                    <img src="images/cloud_large.png" alt="">
                    <img src="images/cloud4.png" alt="">
                </div>
                <div class="wrap progress_d">
                    <div class="step step1_d">
                        <img src="images/inkDot.png" alt="">
                        <div class="stepContent_d">
                            <p>step1</p>
                            <h3>選擇湯牌和日期</h3>
                            <p class="mobile_display">從下方選擇喜愛的湯牌配方，再選擇泡湯日期。</p>
                        </div>
                    </div>
                    <div class="stepLine_d mobile_display">
                        <img src="images/stepLine_gray.png" alt="">
                    </div>
                    <div class="step step2_d mobile_display">
                        <img src="images/inkDot_gray.png" alt="">
                        <div class="stepContent_d">
                            <p>step2</p>
                            <h3>選擇分店和時段</h3>
                            <p>從下方選項選擇分店以及入房泡湯時段。</p>
                        </div>
                    </div>
                    <div class="stepLine_d mobile_display">
                        <img src="images/stepLine_gray.png" alt="">
                    </div>
                    <div class="step step3_d mobile_display">
                        <img src="images/inkDot_gray.png" alt="">
                        <div class="stepContent_d">
                            <p>step3</p>
                            <h3>確認訂房資訊</h3>
                            <p>輸入您的基本資料，並確認訂房細節，方可進行付款。</p>
                        </div>
                    </div>
                </div>
                <div class="wrap select1_container_d">
                    <div class="left_box_d">
                        <div class="publish_l">
                            <div class="springCard publish_card" id="add_card">
                                <!-- <img src="images/springCard.png" alt=""> -->
                                <img src="images/springCard02.png" alt="">
                                <div class="add_button_d">
                                    <div class="add_button"></div>
                                    <p>載入我的湯牌</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="middle_box_d">
                        <div class="calendar_top_d">
                            <div class="calendar_top_box_left_d">
                                <div class="herbsImg_d">
                                    <img src="images/sakura.png" alt="">
                                </div>
                                <div class="herbsContent_d">
                                    <p>
                                        目前選用之湯牌包含時段限定藥材 : <span class="herbsTitle">櫻花</span><br>
                                        <span class="mobile_display">已為您篩選出可使用本湯牌之時段</sapn>。
                                    </p>
                                </div>
                            </div>
                            <div class="calendar_top_box_right_d">
                                <div class="yy">
                                    <p>
                                        <span id="yy-sp">年份</span>
                                    </p>
                                </div>
                                <div class="mm">
                                    <!-- <div class="arrow_left" id="left-1"></div> -->
                                    <i id="left-1" class="fas fa-chevron-left"></i>
                                    <p>
                                        <span id="mm-sp">月份</span>月
                                    </p>
                                    <!-- <div class="arrow_right" id="right-1"></div> -->
                                    <i id="right-1" class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="calendar_bottom_d">
                            <table class="calendar">
                                <tbody>
                                    <tr>
                                        <th>日</th>
                                        <th>一</th>
                                        <th>二</th>
                                        <th>三</th>
                                        <th>四</th>
                                        <th>五</th>
                                        <th>六</th>
                                    </tr>
                                </tbody>
                                <tbody id="calendar-tb">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="right_box_d"></div>
                    <div class="bottom_box_d">
                        <div class="nextStepBtn_d">
                            <div class="btn_b nextStep">下一步</div>
                        </div>
                        <div class="cardPrice_d">
                            <span>湯牌價格</span>
                            <span>NT$<span id="cardPriceText">0</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page_d second_page">
                <div class="backgroundImgCloud mobile_display">
                    <img src="images/tree05.png" alt="">
                    <img src="images/mt1.png" alt="">
                    <img src="images/mt2.png" alt="">
                    <img src="images/tree04.png" alt="">
                    <img src="images/mt1.png" alt="">
                    <img src="images/cloud_large.png" alt="">
                    <img src="images/cloud_large.png" alt="">
                    <img src="images/cloud4.png" alt="">
                    <img src="images/tree06.png" alt="">
                    <img src="images/cloud2.png" alt="">
                </div>
                <div class="wrap progress_d">
                    <div class="step step1_d mobile_display">
                        <img src="images/inkDot.png" alt="">
                        <div class="stepContent_d">
                            <p>step1</p>
                            <h3>選擇湯牌和日期</h3>
                            <p>從下方選擇喜愛的湯牌配方，再選擇泡湯日期。</p>
                        </div>
                    </div>
                    <div class="stepLine_d mobile_display">
                        <img src="images/stepLine.png" alt="">
                    </div>
                    <div class="step step2_d">
                        <img src="images/inkDot.png" alt="">
                        <div class="stepContent_d">
                            <p>step2</p>
                            <h3>選擇分店和時段</h3>
                            <p class="mobile_display">從下方選項選擇分店以及入房泡湯時段。</p>
                        </div>
                    </div>
                    <div class="stepLine_d mobile_display">
                        <img src="images/stepLine_gray.png" alt="">
                    </div>
                    <div class="step step3_d mobile_display">
                        <img src="images/inkDot_gray.png" alt="">
                        <div class="stepContent_d">
                            <p>step3</p>
                            <h3>確認訂房資訊</h3>
                            <p>輸入您的基本資料，並確認訂房細節，方可進行付款。</p>
                        </div>
                    </div>
                    <div class="previousStep_d">
                        <div class="backButtonText_d">
                            <span>回上一步</span>
                        </div>
                        <div class="backButtonImg_d">
                            <img src="images/backButton.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="wrap select2_container_d">
                    <div class="background_d">
                        <div class="slider">
                            <ul class="slider-list">

                                <li class="slider-list__item slider-list__item_active">
                                    <span class="back__element">
                                        <img src="images/sunLight02.png" />
                                    </span>
                                    <span class="main__element">
                                        <img src="images/blueSky.png" />
                                    </span>
                                    <span class="front__element">
                                        <img src="images/birds.png" />
                                    </span>
                                </li>

                                <li class="slider-list__item">
                                    <span class="back__element">
                                        <img src="images/sunLight.png" />
                                    </span>
                                    <span class="main__element">
                                        <img src="images/sunSetSky.png" />
                                    </span>
                                    <span class="front__element">
                                        <img src="images/sunSetCloud.png" />
                                    </span>
                                </li>

                                <li class="slider-list__item">
                                    <span class="back__element">
                                        <img src="images/stars02.png" />
                                    </span>
                                    <span class="main__element">
                                        <img src="images/stars01.png" />
                                    </span>
                                    <span class="front__element">
                                        <img src="images/moon.png" />
                                    </span>
                                </li>

                                <div class="slider__controls">
                                    <a class="slider__arrow slider__arrow_prev"></a>
                                    <a class="slider__arrow slider__arrow_next"></a>
                                </div>

                            </ul>
                        </div>
                    </div>
                    <div class="select2_left_box_d">
                        <div class="roomImg_d">
                            <img src="images/room01.png" alt="">
                            <img src="images/room02.png" alt="">
                            <img src="images/room03.png" alt="">
                        </div>
                    </div>
                    <div class="select2_right_box_d">
                        <div class="firsrRow_d">
                            <div class="branchTitle_d">
                                <h3>選擇分店</h3>
                            </div>
                            <div class="branchContent_d">
                                <div class="branchSelect_d">
                                    <div class="branch firstBranch_d">
                                        <div class="branch_container firstBranch_container">
                                            <p class="firstBranch_p">中央</p>
                                            <div class="store1Img_d">
                                                <img src="images/store01.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="branch secondBranch_d">
                                        <div class="branch_container secondBranch_container">
                                            <p class="secondBranch_p">桃園</p>
                                            <div class="store2Img_d">
                                                <img src="images/store02.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="branch thirdBranch_d">
                                        <div class="branch_container thirdBranch_container">
                                            <p class="thirdBranch_p">北投</p>
                                            <div class="store3Img_d">
                                                <img src="images/store03.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="branchText_d">
                                    <div class="branchTextContainer">
                                        <div class="branchTips">
                                            <h2>請選擇分店哦!!!</h2>
                                        </div>
                                        <div class="firstBranchText">
                                            <div class="branchText_title">
                                                <div class="branchText_title_Img_d">
                                                    <img src="images/store01_bk.png" alt="" style="width:110%;">
                                                </div>
                                                <p class="branchText_title_text">中央店</p>
                                            </div>
                                            <div class="branchText_addr">
                                                <p>桃園市中壢區300號</p>
                                            </div>
                                            <div class="branchText_tel">
                                                <p>03-3258778</p>
                                            </div>
                                        </div>
                                        <div class="secondBranchText">
                                            <div class="branchText_title">
                                                <div class="branchText_title_Img_d">
                                                    <img src="images/store02_bk.png" alt="" style="width:85%;">
                                                </div>
                                                <p class="branchText_title_text">桃園店</p>
                                            </div>
                                            <div class="branchText_addr">
                                                <p>桃園市中壢區300號</p>
                                            </div>
                                            <div class="branchText_tel">
                                                <p>03-3258778</p>
                                            </div>
                                        </div>
                                        <div class="thirdBranchText">
                                            <div class="branchText_title">
                                                <div class="branchText_title_Img_d">
                                                    <img src="images/store03_bk.png" alt="">
                                                </div>
                                                <p class="branchText_title_text">北投店</p>
                                            </div>
                                            <div class="branchText_addr">
                                                <p>桃園市中壢區300號</p>
                                            </div>
                                            <div class="branchText_tel">
                                                <p>03-3258778</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="secondRow_d">
                            <div class="clockTitle_d">
                                <h3>選擇時段</h3>
                            </div>
                            <div class="clockContent_d">
                                <div class="clockSelect_d">
                                    <div class="clockSelectCircle_d slider__nav-bar">
                                        <div class="clock firstClock_d nav-control">
                                            <div class="clock_container firstClock_container">
                                                <div class="clock1Img_d">
                                                    <img src="images/morning.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clock secondClock_d nav-control">
                                            <div class="clock_container secondClock_container">
                                                <div class="clock2Img_d">
                                                    <img src="images/afternoon.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clock thirdClock_d nav-control">
                                            <div class="clock_container thirdCranch_container">
                                                <div class="clock3Img_d">
                                                    <img src="images/night.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clockText_d">
                                    <div class="clockTextContainer">
                                        <div class="clockTips">
                                            <h2>請選擇時段哦!!!</h2>
                                        </div>
                                        <div class="firstClockText">
                                            <div class="clockText_title">
                                                <div class="clockText_title_Img_d">
                                                    <img src="images/morning.png" alt="">
                                                </div>
                                                <p class="clockText_title_text">早上時段</p>
                                            </div>
                                            <div class="clockText_clock">
                                                <p>09:00-12:00</p>
                                            </div>
                                        </div>
                                        <div class="secondClockText">
                                            <div class="clockText_title">
                                                <div class="clockText_title_Img_d">
                                                    <img src="images/afternoon.png" alt="">
                                                </div>
                                                <p class="clockText_title_text">下午時段</p>
                                            </div>
                                            <div class="clockText_clock">
                                                <p>15:00-18:00</p>
                                            </div>
                                        </div>
                                        <div class="thirdClockText">
                                            <div class="clockText_title">
                                                <div class="clockText_title_Img_d">
                                                    <img src="images/night.png" alt="">
                                                </div>
                                                <p class="clockText_title_text">晚上時段</p>
                                            </div>
                                            <div class="clockText_clock">
                                                <p>21:00-24:00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="thirdRow_d">
                            <div class="roomPrice">
                                <span>湯屋價格</span>
                                <span>NT$<span id="roomPriceText">1200</span></span>
                            </div>
                            <div class="nextStepBtn_d">
                                <div class="btn_b nextStep">下一步</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page_d third_page">
                <div class="backgroundImgCloud mobile_display">
                    <img src="images/cloud5.png" alt="">
                    <img src="images/cloud6.png" alt="">
                    <img src="images/cloud7.png" alt="">
                    <img src="images/cloud1.png" alt="">
                    <img src="images/cloud_l2.png" alt="">
                </div>
                <div class="wrap progress_d">
                    <div class="step step1_d mobile_display">
                        <img src="images/inkDot.png" alt="">
                        <div class="stepContent_d">
                            <p>step1</p>
                            <h3>選擇湯牌和日期</h3>
                            <p>從下方選擇喜愛的湯牌配方，再選擇泡湯日期。</p>
                        </div>
                    </div>
                    <div class="stepLine_d mobile_display">
                        <img src="images/stepLine.png" alt="">
                    </div>
                    <div class="step step2_d mobile_display">
                        <img src="images/inkDot.png" alt="">
                        <div class="stepContent_d">
                            <p>step2</p>
                            <h3>選擇分店和時段</h3>
                            <p>從下方選項選擇分店以及入房泡湯時段。</p>
                        </div>
                    </div>
                    <div class="stepLine_d mobile_display">
                        <img src="images/stepLine.png" alt="">
                    </div>
                    <div class="step step3_d">
                        <img src="images/inkDot.png" alt="">
                        <div class="stepContent_d">
                            <p>step3</p>
                            <h3>確認訂房資訊</h3>
                            <p class="mobile_display">輸入您的基本資料，並確認訂房細節，方可進行付款。</p>
                        </div>
                    </div>
                    <div class="previousStep_d">
                        <div class="backButtonText_d">
                            <span>回上一步</span>
                        </div>
                        <div class="backButtonImg_d">
                            <img src="images/backButton.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="wrap detail_container_d">
                    <div class="detail_left_box_d">
                        <div class="roomPic_d">
                            <div class="roomPicSlider_d">
                                <div class="roomPic">
                                    <img src="images/01.png" alt="">
                                </div>
                                <div class="roomPic">
                                    <img src="images/02.png" alt="">
                                </div>
                                <div class="roomPic">
                                    <img src="images/03.png" alt="">
                                </div>
                                <!-- <div class="roomPic">
                                    <img src="images/房型.png" alt="">
                                </div>
                                <div class="roomPic">
                                    <img src="images/房型.png" alt="">
                                </div>
                                <div class="roomPic">
                                    <img src="images/房型.png" alt="">
                                </div>
                                <div class="roomPic">
                                    <img src="images/房型.png" alt="">
                                </div>
                                <div class="roomPic">
                                    <img src="images/房型.png" alt="">
                                </div> -->
                            </div>
                        </div>
                        <!-- <div class="prism-slider">
                            <ul class="navigation"></ul>
                        </div> -->
                        <div class="roomInfo_d">
                            <div class="roomInfoDate">
                                <div class="roomInfoDateImg_d">
                                    <img src="images/calender.svg" alt="">
                                </div>
                                <p id="roomResDate">2019/04/08</p>
                            </div>
                            <div class="roomInfoClock">
                                <div class="roomInfoClockImg_d">
                                    <img src="images/morning_black.png" alt="">
                                </div>
                                <p id="roomResTime">中午</p>
                            </div>
                            <div class="roomInfoTitle">
                                <div class="roomInfoTitleImg_d">
                                    <img src="images/house.svg" alt="">
                                </div>
                                <p id="roomResName">中央店</p>
                            </div>
                            <div class="roomInfoText">
                                <p>靠山面海，景觀優美，湯屋簡潔而溫潤，適合養顏美容的療效湯頭。</p>
                            </div>
                        </div>
                    </div>
                    <div class="detail_right_box_d">
                        <h3>訂房資訊<span>Account Name</span></h3>
                        <table class="orderDetails">
                            <tr>
                                <th>姓氏</th>
                                <td id="orderMemFirstName">林</td>
                                <th class="th_rightSide">名稱</th>
                                <td id="orderMemLastName">建廷</td>
                            </tr>
                            <tr>
                                <th>身分證號</th>
                                <td id="orderTwId">A123456789</td>
                                <th class="th_rightSide">連絡電話</th>
                                <td id="orderMemTel">0912345678</td>
                            </tr>
                            <tr>
                                <th>日期</th>
                                <td id="orderResDate" colspan="3">2018/04/08</td>
                            </tr>
                            <tr>
                                <th>時段</th>
                                <td id="orderResTime" colspan="3">早上09:00-12:00</td>
                            </tr>
                            <tr>
                                <th>地點</th>
                                <td colspan="3"><span id="orderRoomName">北投分店</span> ( NT$<span id="orderRoomPrice">1200</span> )</td>
                            </tr>
                            <tr>
                                <th>使用湯牌</th>
                                <td colspan="3"><span id="orderCardName">舒筋軟骨湯</span> ( NT$<span id="orderCardPrice">1200</span> )</td>
                            </tr>
                            <tr>
                                <th>優惠券</th>
                                <td colspan="3">
                                    <select name="coupon" id="coupon">
                                        <option value="0">85折</option>
                                    </select>
                                    <span>( - NT$<span id="couponDiscount">100</span> )</span>
                                </td>
                            </tr>
                        </table>
                        <div class="orderNote" style="line-height:1.5;">
                            <p>注意事項:</p>
                            <p>1.一般飯店入住時間(CHECK
                                IN)為15:00以後，若有特別規定入住時間則不在此限。敬請依飯店之規定辦理入住;若您無法在此規定時間內辦理入住手續，請事先與飯店電話確認，否則飯店將視為您當天取消訂房，恕不退費。</p>
                        </div>
                        <div class="confirm_d">
                            <div class="roomTotalPrice">
                                <!-- <span>優惠券折扣<span class="discountTxt">-NT$100</span></span> -->
                                <span>總價</span>
                                <span>NT$<span id="roomTotalPriceText">2300</span></span>
                            </div>
                            <div class="nextStepBtn_d">
                                <div class="btn_b nextStep">前往付款</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="all_rights">
                    <h4>Non commercial use&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright © 2019 Mr.Spring All rights
                        reserved</h4>
                </div>
            </div>
        </div>
    </div>
        
        
    
   
    <script src="js/header.js"></script>
    <script src="js/login.js"></script>
    <script src="js/loadInfo.js"></script>
    <script src="js/yt_cardFilter.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/select.js"></script>
    <!-- <script src="js/PrismSlider.js"></script> -->
    <script src="js/easing.js"></script>
    <!-- <script src="js/sliderMain.js"></script> -->
    <script src="js/anime.min.js"></script>
    <script src="js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
    <script src="js/Chart.js"></script>
    <!-- <script src="js/radar.js"></script> -->
    <!-- <script src="js/article_poblish_radar.js"></script> -->
    <script src="js/chooseCard.js"></script>
    <!-- <script type="text/javascript" src="js/article_poblish.js"></script> -->
    <script src="js/reservationStep.js"></script>
</body>

</html>