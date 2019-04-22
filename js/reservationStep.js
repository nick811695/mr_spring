var tempIndex = 0;
var tempVh = 0;

if(parseInt(window.innerWidth) > 768){
    tempVh = 100;
}else{
    tempVh = 200;
}
console.log(window.innerWidth);

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
        PageContainer.style.transform = `translateY(${-1*tempVh}vh)`;
        tempIndex++;
    }else if(tempIndex == 1){
        PageContainer.style.transform = `translateY(${-2*tempVh}vh)`;
        tempIndex++;
    }
    window.scroll(0,0);
    console.log(tempIndex);
    console.log(tempVh);
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
    console.log(tempIndex);
    console.log(tempVh);
}

//偵測視窗width的改變
window.onresize = resize;

function resize(){
    if(parseInt(window.innerWidth) > 768){
        tempVh = 100;
    }else{
        tempVh = 200;
    }
    console.log(window.innerWidth);
}