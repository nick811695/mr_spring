

var memId=document.getElementById("memId");
var loginBox=document.getElementById("lightBox");


function loginOrNot(){
    if (memId.value == 0){
        lightBox.style.display="block";
        lightBox.style.opacity=1;
        TweenMax.from("#lightBox", 1, { opacity:0, ease: Power4.easeInOut });
       
    }else{
        window.location.href = "game.html";
    }
    console.log(memId);

}

function init(){
    document.getElementsByClassName("getCoupon")[0].onclick=loginOrNot;
}

window.addEventListener("load",init,false);