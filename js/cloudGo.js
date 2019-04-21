var monkeyWrap = document.getElementById("monkey_wrap");
var x = document.getElementById("content_frame");
var colorsepia = document.getElementsByClassName("sepia_cross")[0];
var colorsepia02 = document.getElementsByClassName("sepia_cross")[1];
var colorsepia03 = document.getElementsByClassName("sepia_cross")[2];
var slogon01 = document.getElementById("slogon01");
var slogon02 = document.getElementById("slogon02");

//switch content=================================================================

var title = document.getElementById("spring_name");
var paragrah01 = document.getElementsByClassName("paragraph")[0];
var paragrah02 = document.getElementsByClassName("paragraph")[1];

var smallPic01 = document.getElementsByClassName("intro_pic_small")[0];
var smallPic02 = document.getElementsByClassName("intro_pic_small")[1];
var smallPic03 = document.getElementsByClassName("intro_pic_small")[2];

var waterColor = document.getElementById("water_color_change");
 var oriColors = {top:"#ff9f9f", bottom:"#fff09b"};
// var waterTween = TweenMax.to(colors, 1, {colorProps:{top:"#ff9f9f", bottom:"#fff09b"}, onUpdate:colorize, onUpdateParams:["#water"], paused:true});

//animation=================================================================

var ZZZ = document.getElementsByClassName("note")[0];
var smoke01 = document.getElementsByClassName("sk_wrap")[0];
var smoke02 = document.getElementsByClassName("sk_wrap02")[0];
var monkeyFace = document.getElementById("monkeyFace");
var monkeyEyes = document.getElementById("monkeyEyes");
var wave01 = document.getElementById("wave01");
var wave02 = document.getElementById("wave02");


//first page Show Herb=================================================================

function changeWater(){

}
function ShowHerb01() {
  if (x.style.opacity == 0) {
    colorsepia.style.opacity = 0;
    colorsepia02.style.opacity = 1;
    colorsepia03.style.opacity = 1;
    x.style.opacity = 1;
    ZZZ.style.opacity = 0;
    monkeyFace.style.opacity = 0;
    monkeyEyes.style.opacity = 0;
    slogon01.style.opacity = 0;
    slogon02.style.opacity = 0;
    waterColor.style.backgroundColor = "#ff9f9f";
    TweenMax.from("#content_frame", 2, { opacity: 0, ease: Power4.easeIn });
    if($(window).width()<=768){
      TweenMax.fromTo("#monkey_wrap", 2, {
        y: 0,
        repeat: 0,
        ease: Power1.easeInOut
      }, {
          y: 200,
          repeat: 0,
          ease: Power1.easeInOut,
          // yoyo: true
        });
    } 
    else{
    
      TweenMax.fromTo("#monkey_wrap", 2, {
        x: 0,
        repeat: 0,
        ease: Power1.easeInOut
      }, {
          x: -300,
          repeat: 0,
          ease: Power1.easeInOut,
          yoyo: true
        });

    }
   
  } else {
    colorsepia.style.opacity = 0;
    colorsepia02.style.opacity = 1;
    colorsepia03.style.opacity = 1;
    ZZZ.style.opacity = 0;
    monkeyFace.style.opacity = 0;
    monkeyEyes.style.opacity = 0;
    slogon01.style.opacity = 0;
    slogon02.style.opacity = 0;
    waterColor.style.backgroundColor = "#ff9f9f";
    title.innerHTML = "舒筋緩骨湯";
    paragrah01.innerHTML = "【療效】山茱萸理氣解鬱，活血散瘀，和血調經。菊花治胃氣痛、新久風痺、吐血、月經不調、赤白帶、赤白痢、乳癰腫毒、跌打損傷；薰衣草：和中，治肝氣犯胃。";
    paragrah02.innerHTML = "【配方】山茱萸、菊花、薰衣草。";
    smallPic01.src = "./images/herb01.svg";
    smallPic02.src = "./images/herb02.svg";
    smallPic03.src = "./images/herb03.svg";  
    TweenMax.from("#spring_name", 1, { opacity: 0, ease: Power3.easeIn });
    TweenMax.from(".paragraph", 1, { opacity: 0, ease: Power3.easeIn });
    TweenMax.from(".intro_pic_small", 1, { opacity: 0, ease: Power1.easeIn });
    monkeyWrap.style.left="0";

  
  }
  //  else {
  //   x.style.opacity = "0";
  //   // colorSapia.style.display="block";
  //   // TweenMax.fromTo("#content_frame", 2, {opacity: 1, ease: Power4.easeIn},{opacity: 0, ease: Power4.easeOut});
  //   monkey.style.marginLeft = "420px";
  //   TweenMax.fromTo("#mr_spring_for_firstpage",2,{ 
  //       x:-120,
  //       repeat: 0,
  //       ease: Power1.easeInOut},{
  //       x:55,
  //       repeat: 0,
  //       ease: Power1.easeInOut,
  //       yoyo:true
  //   });
  // }
}

function ShowHerb02() {
  if (x.style.opacity == 0) {
    colorsepia.style.opacity = 1;
    colorsepia02.style.opacity = 0;
    colorsepia03.style.opacity = 1;
    ZZZ.style.opacity = 1;
    monkeyFace.style.opacity = 0;
    monkeyEyes.style.opacity = 0;
    slogon01.style.opacity = 0;
    slogon02.style.opacity = 0;
    waterColor.style.backgroundColor = "#00e5be";
    x.style.opacity = 1;
    title.innerHTML = "安定心神湯";
    paragrah01.innerHTML = "【療效】檸檬除可保養肌膚，有鎮靜安神的效果，建議到中藥房或花茶店買食用檸檬泡，免去農藥疑慮。而蒜頭，是很好的抑菌植物，搭配生薑一起泡澡，可放鬆肌肉、幫助睡眠。";
    paragrah02.innerHTML = "【配方】檸檬、蒜頭、生薑。";
    smallPic01.src = "./images/herb04.png";
    smallPic02.src = "./images/herb05.png";
    smallPic03.src = "./images/herb06.png";
    TweenMax.from("#content_frame", 2, { opacity: 0, ease: Power4.easeIn });
    if($(window).width()<=768){
      TweenMax.fromTo("#monkey_wrap", 2, {
        y: 0,
        repeat: 0,
        ease: Power1.easeInOut
      }, {
          y: 200,
          repeat: 0,
          ease: Power1.easeInOut,
          // yoyo: true
        });
    }else{
      TweenMax.fromTo("#monkey_wrap", 2, {
        x: 0,
        repeat: 0,
        ease: Power1.easeInOut
      }, {
          x: -300,
          repeat: 0,
          ease: Power1.easeInOut,
          yoyo: true
        });

    }
    
    // TweenMax.fromTo(".note", 2, {
    //   x: -15,
    //   repeat: 0,
    //   ease: Power1.easeInOut
    // }, {
    //     x: -200,
    //     repeat: 0,
    //     ease: Power1.easeInOut,
    //     yoyo: true
    //   });
    

  } else {
    colorsepia.style.opacity = 1;
    colorsepia02.style.opacity = 0;
    colorsepia03.style.opacity = 1;
    ZZZ.style.opacity = 1;
    monkeyFace.style.opacity = 0;
    monkeyEyes.style.opacity = 0;
    slogon01.style.opacity = 0;
    slogon02.style.opacity = 0;
    waterColor.style.backgroundColor = "#00e5be";
    title.innerHTML = "安定心神湯";
    paragrah01.innerHTML = "【療效】檸檬除可保養肌膚，有鎮靜安神的效果，建議到中藥房或花茶店買食用檸檬泡，免去農藥疑慮。而蒜頭，是很好的抑菌植物，搭配生薑一起泡澡，可放鬆肌肉、幫助睡眠。";
    paragrah02.innerHTML = "【配方】檸檬、蒜頭、生薑。";
    smallPic01.src = "./images/herb04.png";
    smallPic02.src = "./images/herb05.png";
    smallPic03.src = "./images/herb06.png";
    TweenMax.from("#spring_name", 1, { opacity: 0, ease: Power1.easeIn });
    TweenMax.from(".paragraph", 1, { opacity: 0, ease: Power1.easeIn });
    TweenMax.from(".intro_pic_small", 1, { opacity: 0, ease: Power1.easeIn });
    monkeyWrap.style.left="0";
    

  }

}


function ShowHerb03() {
  if (x.style.opacity == 0) {
    colorsepia.style.opacity = 1;
    colorsepia02.style.opacity = 1;
    colorsepia03.style.opacity = 0;
    ZZZ.style.opacity = 0;
    monkeyFace.style.opacity = 1;
    monkeyEyes.style.opacity = 1;
    slogon01.style.opacity = 0;
    slogon02.style.opacity = 0;
    waterColor.style.backgroundColor = " #f6ae54";
    x.style.opacity = 1;
    title.innerHTML = "養顏美容湯";
    paragrah01.innerHTML = "【療效】八角、枸杞具有清熱解毒、涼血、止俐的功效。另外，佛手柑芳香疏散，可撫平焦慮、沮喪、振奮情緒。讓心裡恢復平衡，緩解工作生活的壓力。";
    paragrah02.innerHTML = "【配方】八角、枸杞、佛手柑。<br><br>";
    console.log(smallPic01);
    smallPic01.src = "./images/herb07.png";
    smallPic02.src = "./images/herb08.png";
    smallPic03.src = "./images/herb09.png";
    TweenMax.from("#content_frame", 2, { opacity: 0, ease: Power4.easeIn });  
    TweenMax.from("#monkeyFace", 2, { opacity: 0, ease: Power4.easeIn });
    TweenMax.from("#monkeyEyes", 2, { opacity: 0, ease: Power4.easeIn });
    if($(window).width()<=768){
      TweenMax.fromTo("#monkey_wrap", 2, {
        y: 0,
        repeat: 0,
        ease: Power1.easeInOut
      }, {
          y: 200,
          repeat: 0,
          ease: Power1.easeInOut,
          // yoyo: true
        });
    }else{
      TweenMax.fromTo("#monkey_wrap", 2, {
        x: 0,
        repeat: 0,
        ease: Power1.easeInOut
      }, {
          x: -300,
          repeat: 0,
          ease: Power1.easeInOut,
          yoyo: true
        });

    }
  } else {
    colorsepia.style.opacity = 1;
    colorsepia02.style.opacity = 1;
    colorsepia03.style.opacity = 0;
    ZZZ.style.opacity = 0;
    monkeyFace.style.opacity = 1;
    monkeyEyes.style.opacity = 1;
    slogon01.style.opacity = 0;
    slogon02.style.opacity = 0;
    waterColor.style.backgroundColor = "#f6ae54";
    title.innerHTML = "養顏美容湯";
    paragrah01.innerHTML = "【療效】八角、枸杞具有清熱解毒、涼血、止俐的功效。另外，佛手柑芳香疏散，可撫平焦慮、沮喪、振奮情緒。讓心裡恢復平衡，緩解工作生活的壓力。";
    paragrah02.innerHTML = "【配方】八角、枸杞、佛手柑。<br><br>";
    smallPic01.src = "./images/herb07.png";
    smallPic02.src = "./images/herb08.png";
    smallPic03.src = "./images/herb09.png";  
    TweenMax.from("#monkeyFace", 1, { opacity: 0, ease: Power1.easeIn });
    TweenMax.from("#monkeyEyes", 1, { opacity: 0, ease: Power1.easeIn });
    TweenMax.from("#spring_name", 1, { opacity: 0, ease: Power1.easeIn });
    TweenMax.from(".paragraph", 1, { opacity: 0, ease: Power1.easeIn });
    TweenMax.from(".intro_pic_small", 1, { opacity: 0, ease: Power1.easeIn });
    monkeyWrap.style.left="0";
    
  }

}


function getDown(){
  if($(window).width()==1024 || $(window).height()==1366){
    document.getElementsByClassName("monkey_animation").style.top="500px";
  }
}

// var slogon=document.getElementById("slogon01");
//   function showSlogon(){
    
//   }
TweenMax.from("#slogon01", 2, { opacity: 0, ease: Power4.easeIn }); 



//first page Show Robot=================================================================

// function ShowTalkFrame() {
//   var robot =  document.getElementsByClassName("robot")[0];
//   var robotTitle = document.getElementsByClassName("robot_title")[0];
//   var talkOuter = document.getElementsByClassName("talk_outer_frame")[0];
//   var talkFrame = document.getElementsByClassName("talk_frame")[0];
//   robot.style.bottom = "0px";
//   robotTitle.style.bottom = "230px";
//   talkOuter.style.bottom = "200px";
//   talkFrame.style.bottom = "-131px";
// }


// function hideTalkFrame() {
//   var robot =  document.getElementsByClassName("robot")[0];
//   var robotTitle = document.getElementsByClassName("robot_title")[0];
//   var talkOuter = document.getElementsByClassName("talk_outer_frame")[0];
//   var talkFrame = document.getElementsByClassName("talk_frame")[0];
//   robot.style.bottom = "-80px";
//   robotTitle.style.bottom = "130px";
//   talkOuter.style.bottom = "100px";
//   talkFrame.style.bottom = "-231px";
// }


function showDiv() {
  document.getElementsByClassName("herb_cross")[0].onclick = ShowHerb01;
  document.getElementById("herb_cross2").onclick = ShowHerb02;
  document.getElementsByClassName("herb_cross")[1].onclick = ShowHerb03;
  // document.getElementById("talk_area").onmouseover = ShowTalkFrame;
  // document.getElementById("talk_area").onmouseleave = hideTalkFrame;
}

window.addEventListener("load", showDiv, false);




//animation=================================================================

TweenMax.fromTo(".herb_cross", 2, {
  y: 10,
  repeat: -1,
  // repeatDelay:1,
  ease: Power1.easeInOut
}, {
    y: 40,
    repeat: -1,
    // repeatDelay:1,
    ease: Power1.easeInOut,
    yoyo: true
  });

TweenMax.fromTo("#herb_cross2", 2, {
  y: 40,
  repeat: -1,
  ease: Power1.easeInOut
}, {
    y: 10,
    repeat: -1,
    ease: Power1.easeInOut,
    yoyo: true
  });

  
TweenMax.fromTo("#monkey_wrap", 2, {
  y: 10,
  repeat: -1,
  ease: Power1.easeInOut
}, {
    y: 20,
    repeat: -1,
    ease: Power1.easeInOut,
    yoyo: true

  });

// TweenMax.fromTo("#mr_spring_for_firstpage", 2, {
//   y: 10,
//   repeat: -1,
//   ease: Power1.easeInOut
// }, {
//     y: 20,
//     repeat: -1,
//     ease: Power1.easeInOut,
//     yoyo: true

//   });

// TweenMax.fromTo("#monkeyFace", 2, {
//   y: -5,
//   repeat: -1,
//   ease: Power1.easeInOut
// }, {
//     y: 5,
//     repeat: -1,
//     ease: Power1.easeInOut,
//     yoyo: true

//   });
// TweenMax.fromTo("#monkeyEyes", 2, {
//   y: -5,
//   repeat: -1,
//   ease: Power1.easeInOut
// }, {
//     y: 5,
//     repeat: -1,
//     ease: Power1.easeInOut,
//     yoyo: true

//   });


TweenMax.fromTo("#wave01", 2, { opacity: 0, ease: Power4.easeIn }, { opacity: 0.8, ease: Power4.easeOut });

TweenMax.fromTo("#wave02", 2, { opacity: 0, ease: Power4.easeIn }, { opacity: 0.8, ease: Power4.easeOut });