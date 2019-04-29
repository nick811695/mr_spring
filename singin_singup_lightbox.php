<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
    <!-- 燈箱：登入 -->
    <div id="lightBox" style=" z-index: 1000;">
            
        <!-- 登入 -->
        <div id="login" class="table_wrap">
            <center>

            <!-- 登入logo -->
            <figure id="login_img" class="Login_pic">
                <img src="images/Logo_browen.svg" alt="湯先生">
            </figure>

            <!-- 註冊大頭貼 -->
            <form id="signin_img" class="Login_pic" enctype="multipart/form-data">
                <label class="signin_label">
                    <input type="file" name="upFile" id="upFile">
                    <div class="imgPreview">
                        <img id="imgPreview" src="images/upload_pic.png" alt="上傳檔案">
                        <i class="fas fa-camera"></i>
                    </div>
                </label>                
            </form>
            </center>

            <center>
                <p id="login_test" class="Login_title">會員登入</p>
            </center>
            <div id="t1">
                <table border="1" align="center" id="tableLogin" class="table_data">
                
                    <tr>
                        <td>
                            <p>帳號</p>
                            <input type="text" name="memId" id="signin_memId" placeholder="example123" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>密碼</p>
                            <input type="password" name="memPsw" id="signin_memPsw" placeholder="******" required>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="t2">
            <table border="1" align="center" id="table_signin" class="table_data">
                
                <tr>
                    <td>
                        <p>姓氏</p>
                        <input type="text" name="memLastName" id="signup_memLastName" placeholder="湯" maxlength="10" autocomplete="off" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>名字</p>
                        <input type="text" name="memFirstName" id="signup_memFirstName" placeholder="生生" maxlength="10" autocomplete="off" required>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <p>暱稱</p>
                        <input type="text" name="memNickname" id="signup_memNickname" placeholder="我是湯先生" maxlength="10" autocomplete="off" required>
                    </td>
                </tr>
                
                <tr>  
                    <td>
                        <p>帳號</p>
                        <input type="text" name="memId" id="signup_memId" placeholder="輸入2~10英數字" maxlength="10" minlength="2" autocomplete="off" required>
                    </td>
                </tr>
                <tr> 
                    <td>
                        <p>密碼</p>
                        <input type="password" name="memPsw" id="signup_memPsw" placeholder="******" maxlength="10" autocomplete="off" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>身分證</p>
                        <input type="text" name="twId" id="signup_twId" placeholder="A123456789" maxlength="10" autocomplete="off" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>信箱</p>
                        <input type="email" name="memEmail" id="signup_memEmail" placeholder="mrspring@email.com" autocomplete="off" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>電話</p>
                        <input type="tel" name="memTel" id="signup_memTel" placeholder="0912345678" maxlength="10" autocomplete="off" required>
                    </td>
                </tr>
                </table>
            </div>
        
            <div class="btn_wrap">
                <center>
                    <button class="btn_s btnLogin" id="btnLogin" style="color:rgb(112, 95, 69);" >登入</button>
                    <button class="btn_s btnLogin" id="btn_signin" style="color:rgb(112, 95, 69);" >註冊</button>
                    <button class="btn_s" id="btnLoginCancel" value="取消">
                        <div class="x_x">
                            <span class="top"></span>
                            <span class="bottom"></span>
                        </div>
                    </button>
                </center>
            </div>
            <center>
                <button type="button" id="test_btn" class="first_time" onclick="memberFunction()">還不是會員嗎?</button>
            </center>
        </div>
   
    </div>


</body>
<script>
    // 點擊登入按鈕
    document.getElementById("btnLogin").addEventListener("click",function(){

        var xhr = new  XMLHttpRequest();
        xhr.onreadystatechange=function (){
            if( xhr.readyState == 4){
                if( xhr.status == 200 ){
                    // alert(`您好`);
                }else{
                    alert( xhr.status );
                }
            }
        }

        xhr.open("post", "signin.php", true);
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        var data_info = "memId=" + document.getElementById("signin_memId").value + "&memPsw=" + document.getElementById("signin_memPsw").value;
        xhr.send(data_info);
    })

    // 點擊註冊按鈕
    document.getElementById("btn_signin").addEventListener("click",function(){
        var xhr = new  XMLHttpRequest();
        xhr.onreadystatechange=function (){
            if( xhr.readyState == 4){
                if( xhr.status == 200 ){
                    // alert(`您好`);
                }else{
                    alert( xhr.status );
                }
            }
        }

        xhr.open("post", "signin.php", true);
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        var data_info = `memId=${document.getElementById("signup_memId").value}`;
        data_info += `&memPsw=${document.getElementById("signup_memPsw").value}`;
        data_info += `&memLastName=${document.getElementById("signup_memLastName").value}`;
        data_info += `&memFirstName=${document.getElementById("signup_memFirstName").value}`;
        data_info += `&memNickname=${document.getElementById("signup_memNickname").value}`;
        data_info += `&twId=${document.getElementById("signup_twId").value}`;
        data_info += `&memTel=${document.getElementById("signup_memTel").value}`;
        data_info += `&memEmail=${document.getElementById("signup_memEmail").value}`;

        xhr.send(data_info); 
    })

    // 點擊下方文字切換註冊/登入
    function memberFunction(){
        var x = document.getElementById('login_test');
        x.innerHTML = "會員註冊";
        var y = document.getElementById('test_btn');
        if(y.innerHTML == '已經有帳號了？'){
            y.innerHTML = '還沒申請帳號?';
            x.innerHTML = "會員登入";
            document.getElementById('t2').style.display = 'none';
            document.getElementById('t1').style.display = 'block';
            document.getElementById('signin_img').style.display = 'none';
            document.getElementById('login_img').style.display = 'block';
            document.getElementById('btnLogin').style.display = 'block';
            document.getElementById('btn_signin').style.display = 'none';
    
        }else{
            y.innerHTML = "已經有帳號了？";
            document.getElementById('t2').style.display = 'block';
            document.getElementById('t1').style.display = 'none';
            document.getElementById('signin_img').style.display = 'block';
            document.getElementById('login_img').style.display = 'none';
            document.getElementById('btnLogin').style.display = 'none';
            document.getElementById('btn_signin').style.display = 'block';
        }
    }
    
    // 註冊圖片即時預覽、得到圖檔
    document.getElementById("upFile").addEventListener("change",function(){
        var file = $('#upFile')[0].files[0];
        var reader = new FileReader;
        reader.onload = function(e) {
            $('#imgPreview').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);

        
    });

    //
</script>
</html>