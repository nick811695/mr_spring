var tempIndex = 0;
var tempVh = 0;
// var sqlString = "";

if(parseInt(window.innerWidth) > 768){
    tempVh = 100;
}else{
    tempVh = 200;
}
// console.log(window.innerWidth);

PageContainer = document.querySelector(".reservationContainer_d");

//下一步btn
page1_nextStep = document.querySelector(".first_page .nextStep");
page2_nextStep = document.querySelector(".second_page .nextStep");

//上一步btn
page2_prevStep = document.querySelector(".second_page .previousStep_d");
page3_prevStep = document.querySelector(".third_page .previousStep_d");

//完成預約btn
page3_nextStep = document.querySelector(".third_page .nextStep");

page1_nextStep.addEventListener("click",nextStep);
page2_nextStep.addEventListener("click",nextStep);

page2_prevStep.addEventListener("click",prevStep);
page3_prevStep.addEventListener("click",prevStep);

// page3_nextStep.addEventListener("click",);

function nextStep(){
    if(tempIndex == 0){
        //判斷有沒有選擇日期
        // console.log(datevalue);
        if(datevalue != ""){
            //每次點選初始化選項
            roomvalue = "";
            clockvalue = "";
            document.getElementsByClassName("firstBranch_d")[0].style.backgroundColor = "rgb(0, 209, 188)";
            document.querySelectorAll(".branch_container img")[0].style.opacity = ".5";
            document.querySelectorAll(".branch_container img")[0].style.filter = "brightness(1)";
            document.getElementById("roomPriceText").innerText = "0";
            document.getElementsByClassName("branchTextContainer")[0].style.transform = "translateY(0)";
            document.getElementsByClassName("clockTextContainer")[0].style.transform = "translateY(0)";
            // document.getElementById("roomPriceText").innerText = document.getElementsByClassName("branch")[0].getAttribute("roomPrice");
            // for(var i = 0;i < document.getElementsByClassName("slider-list__item").length;i++){
            //     if(document.getElementsByClassName("slider-list__item")[i].className.indexOf("slider-list__item_active") != -1){
            //         document.getElementsByClassName("slider-list__item")[i].classList.remove("slider-list__item_active");
            //     }
            // }
            // document.getElementsByClassName("slider-list__item")[0].classList.add("slider-list__item_active");
            
            // document.getElementsByClassName("slider-list__item")[0].style.transform = "rotate(0deg) translateX(0%)";
            // document.querySelectorAll(".slider-list__item .back__element")[0].style.transform = "rotate(0deg) translateX(0%)";
            // document.querySelectorAll(".slider-list__item .front__element")[0].style.transform = "rotate(0deg) translateX(0%)";
            
            // document.getElementsByClassName("slider-list__item")[1].style.transform = "rotate(90deg) translateX(100%)";
            // document.getElementsByClassName("slider-list__item")[2].style.transform = "rotate(90deg) translateX(100%)";

            //初始化選擇時段(不可以點選)
            for(var j = 0;j < document.getElementsByClassName("clock").length;j++){
                document.getElementsByClassName("clock")[j].style.filter = "brightness(.5)";
                document.getElementsByClassName("clock")[j].removeEventListener("click",clockSlide);
                document.getElementsByClassName("clock")[j].classList.remove("nav-control");
            }

            PageContainer.style.transform = `translateY(${-1*tempVh}vh)`;
            tempIndex++;
        }else{
            document.getElementById("smallLightBox_wrapper").style.visibility = "visible";
            document.querySelector("#smallLightBox_wrapper h3").innerHTML = "還沒選擇日期哦!!!"
        }
    }else if(tempIndex == 1){
        //判斷有沒有選擇分店或時段
        // console.log(roomvalue);
        // console.log(clockvalue);
        if(roomvalue != "" && clockvalue != ""){
            //填日期
            document.getElementById("orderResDate").innerText = datevalue.split("-").join("/");
            document.getElementById("roomResDate").innerText = datevalue.split("-").join("/");
            
            //填時段
            if(clockvalue == "morning"){
                document.getElementById("orderResTime").innerText = "早上09:00-12:00";
                document.getElementById("roomResTime").innerText = "早上";
                document.querySelector(".roomInfoClockImg_d img").src = "images/morning_black.png"
            }else if(clockvalue == "afternoon"){
                document.getElementById("orderResTime").innerText = "下午15:00-18:00";
                document.getElementById("roomResTime").innerText = "下午";
                document.querySelector(".roomInfoClockImg_d img").src = "images/afternoon_black.png"
            }else{
                document.getElementById("orderResTime").innerText = "晚上21:00-24:00";
                document.getElementById("roomResTime").innerText = "晚上";
                document.querySelector(".roomInfoClockImg_d img").src = "images/night_black.png"
            }
                
            //填分店
            document.getElementById("orderRoomName").innerText = roomvalue + "分店";
            document.getElementById("roomResName").innerText = roomvalue + "店";

            //填分店照片
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if( xhr.readyState == 4){
                    if( xhr.status == 200 ){
                        showBranchImg(xhr.responseText);
                    }else{
                        alert( xhr.status );
                    }
                }
            }

            var url = "php/branchImg.php?roomvalue=" + roomvalue + "店";
            xhr.open("Get", url, true);
            xhr.send( null );

            function showBranchImg(jsonStr){
                var BranchImg = JSON.parse(jsonStr);
                // console.log(BranchImg);
                document.querySelectorAll(".roomPicSlider_d .roomPic img")[0].src = BranchImg[0].branchImgUrl1;
                document.querySelectorAll(".roomPicSlider_d .roomPic img")[1].src = BranchImg[0].branchImgUrl2;
                document.querySelectorAll(".roomPicSlider_d .roomPic img")[2].src = BranchImg[0].branchImgUrl3;
            }

            PageContainer.style.transform = `translateY(${-2*tempVh}vh)`;
            tempIndex++;
        }else if(roomvalue == "" && clockvalue == ""){
            document.getElementById("smallLightBox_wrapper").style.visibility = "visible";
            document.querySelector("#smallLightBox_wrapper h3").innerHTML = "還沒選擇分店和時段哦!!!"
        }else if(roomvalue != "" && clockvalue == ""){
            document.getElementById("smallLightBox_wrapper").style.visibility = "visible";
            document.querySelector("#smallLightBox_wrapper h3").innerHTML = "還沒選擇時段哦!!!"
        }
    }
    window.scroll(0,0);
    // console.log(tempIndex);
    // console.log(tempVh);
}

function prevStep(){
    if(tempIndex == 1){
        PageContainer.style.transform = `translateY(0)`;
        tempIndex--;
    }else if(tempIndex == 2){
        PageContainer.style.transform = `translateY(${-1*tempVh}vh)`;
        tempIndex--;
    }
    window.scroll(0,0);
    // console.log(tempIndex);
    // console.log(tempVh);
}

//偵測視窗width的改變
window.onresize = resize;

function resize(){
    if(parseInt(window.innerWidth) > 768){
        tempVh = 100;
    }else{
        tempVh = 200;
    }
    // console.log(window.innerWidth);
}