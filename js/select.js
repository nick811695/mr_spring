var store = document.getElementsByClassName("branch");
var storeSlider = document.getElementsByClassName("branchTextContainer");
var roomImg = document.querySelectorAll(".roomImg_d img");
var storeIconColor =  document.querySelectorAll(".branch_container img");
// var store01 = document.getElementsByClassName(".branch .firstBranch_d");
// var store02 = document.getElementsByClassName(".branch .secondBranch_d");
// var store03 = document.getElementsByClassName(".branch .thirdBranch_d");

for(var i = 0;i < store.length;i++){
    store[i].addEventListener("click",storeSlide);
}

function storeSlide(){
    for(var i = 0;i < store.length;i++){
        if(this == store[i]){
            temp = i;
        }
    }

    if(temp == 0){
        storeSlider[0].style.transform = "translateY(0)";
        roomImg[0].style.opacity = "1";
        roomImg[1].style.opacity = "0";
        roomImg[2].style.opacity = "0";

        storeIconColor[0].style.filter = "brightness(1.4)";
        storeIconColor[1].style.filter = "brightness(1)";
        storeIconColor[2].style.filter = "brightness(1)";
        
        storeIconColor[0].style.opacity = "1";
        storeIconColor[1].style.opacity = "0.5";
        storeIconColor[2].style.opacity = "0.5";
        
        store[0].style.backgroundColor="#009c8c";
        store[1].style.backgroundColor="#f9c8b9";
        store[2].style.backgroundColor="#7fd1de";
        //store01.style.backgroundColor="#009c8c";
        //store02.style.backgroundColor="#f9c8b9";
        //store03.style.backgroundColor="#7fd1de";
        
    }else if(temp == 1){
        storeSlider[0].style.transform = "translateY(-70px)";
        roomImg[0].style.opacity = "0";
        roomImg[1].style.opacity = "1";
        roomImg[2].style.opacity = "0";

        storeIconColor[0].style.filter = "brightness(1)";
        storeIconColor[1].style.filter = "brightness(1.4)";
        storeIconColor[2].style.filter = "brightness(1)";

        storeIconColor[0].style.opacity = "0.5";
        storeIconColor[1].style.opacity = "1";
        storeIconColor[2].style.opacity = "0.5";
        
        store[0].style.backgroundColor="#00d1bc";
        store[1].style.backgroundColor="#ef8575";
        store[2].style.backgroundColor="#7fd1de";
        //store01.style.backgroundColor="#00d1bc";
        //store02.style.backgroundColor="#ef8575";
        //store03.style.backgroundColor="#7fd1de";
    }else if(temp == 2){
        storeSlider[0].style.transform = "translateY(-140px)";
        roomImg[0].style.opacity = "0";
        roomImg[1].style.opacity = "0";
        roomImg[2].style.opacity = "1";

        storeIconColor[0].style.filter = "brightness(1)";
        storeIconColor[1].style.filter = "brightness(1)";
        storeIconColor[2].style.filter = "brightness(1.4)";

        storeIconColor[0].style.opacity = "0.5";
        storeIconColor[1].style.opacity = "0.5";
        storeIconColor[2].style.opacity = "1";
        
        store[0].style.backgroundColor="#00d1bc";
        store[1].style.backgroundColor="#f9c8b9";
        store[2].style.backgroundColor="#00b7ee";
        //store01.style.backgroundColor="#00d1bc";
        //store02.style.backgroundColor="#f9c8b9";
        //store03.style.backgroundColor="#00b7ee";
    }
}



var clock = document.getElementsByClassName("clock");
var clockSlider = document.getElementsByClassName("clockTextContainer");

for(var i = 0;i < clock.length;i++){
    clock[i].addEventListener("click",clockSlide);
}

function clockSlide(){
    for(var i = 0;i < clock.length;i++){
        if(this == clock[i]){
            temp = i;
        }
    }

    if(temp == 0){
        clockSlider[0].style.transform = "translateY(0)";
        roomImg[0].style.filter = "brightness(1.2)";
        roomImg[1].style.filter = "brightness(1.2)";
        roomImg[2].style.filter = "brightness(1.2)";
    }else if(temp == 1){
        clockSlider[0].style.transform = "translateY(-70px)";
        roomImg[0].style.filter = "brightness(1)";
        roomImg[1].style.filter = "brightness(1)";
        roomImg[2].style.filter = "brightness(1)";
    }else if(temp == 2){
        clockSlider[0].style.transform = "translateY(-140px)";
        roomImg[0].style.filter = "brightness(0.8)";
        roomImg[1].style.filter = "brightness(0.8)";
        roomImg[2].style.filter = "brightness(0.8)";
    }
}