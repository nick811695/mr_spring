
//定義變數
var chartRadarDOM;
var chartRadarDOM2;
var chartRadarData;
var chartRadarOptions;

    //載入雷達圖
Chart.defaults.global.legend.display = false;
Chart.defaults.global.defaultFontColor = 'rgba(0,0,74, 1)';
chartRadarDOM = document.getElementById("chartRadar");
chartRadarDOM2 = document.getElementById("chartRadar2");
chartRadarData;
chartRadarOptions = 
{   
    scale: 
    {
        ticks: 
        {
            fontSize: 18,
            beginAtZero: true,
            maxTicksLimit: 7,
            min:0,
            max:1
        },
        pointLabels: //類別字
        {   
            fontFamily: "pigmo",
            fontSize: 18,
            fontColor: ['rgba(221,125,29,1)', 'rgba(178,79,89,1)', 'rgba(106,145,45,1)']
        },
        gridLines: //網線
        {   

            color: '#aaa',
        },
        legend:
        {
        },
    }
};

console.log("---------Rader Data--------");
var graphData =[0.6, 0.1, 0.4];


console.log("--------Rader Create-------------");
console.log(graphData);
    
//CreateData
chartRadarData = {

    labels: ['舒筋活骨', '養顏美容', '安定心神'],
    datasets: [{
        // label: `療效`,
        backgroundColor: "rgba(250,180,0,.6)",
        borderColor: "rgba(225,225,225,.3)",
        pointBackgroundColor: ['rgba(221,125,29,.8)', 'rgba(178,79,89,.8)', 'rgba(106,145,45,.8)'],
        pointBorderColor: ['rgba(221,125,29,.8)', 'rgba(178,79,89,.8)', 'rgba(106,145,45,.8)'],
        pointHoverBackgroundColor: ['rgba(221,125,29,.8)', 'rgba(178,79,89,.8)', 'rgba(106,145,45,.8)'],
        pointHoverBorderColor: ['rgba(221,125,29,.8)', 'rgba(178,79,89,.8)', 'rgba(106,145,45,.8)'],
        pointBorderWidth: 1,
        pointHoverBorderWidth: 0,
        borderJoinStyle: 'round',
        fillColor: '#f00',
        data: graphData}]
};
    
//Draw
var chartRadar = new Chart(chartRadarDOM, {
    type: 'radar',
    data: chartRadarData,
    options: chartRadarOptions
});
var chartRadar = new Chart(chartRadarDOM2, {
    type: 'radar',
    data: chartRadarData,
    options: chartRadarOptions
});