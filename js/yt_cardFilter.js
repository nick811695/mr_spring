document.getElementById("select-box1").addEventListener("input",cardFilter);


function cardFilter(){

    // console.log(document.getElementById("select-box1").value);


    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if( xhr.readyState == 4){
            if( xhr.status == 200 ){
                cardchange(xhr.responseText);
            }else{
                alert( xhr.status );
            }
        }
    }

    var url = "php/yt_cardFilter.php?cardFilter=" + document.getElementById("select-box1").value;
    xhr.open("Get", url, true);
    xhr.send( null );
}


function cardchange(jsonStr){
    var cardResult = JSON.parse(jsonStr);
    console.log(cardResult.length);

    var cardInnerHtml = "";

    document.getElementsByClassName("responsive")[0].innerHTML = cardInnerHtml;
    for(let i = 0;i < cardResult.length;i++){
        cardInnerHtml += `  <div class="cards">
                                <div class="card card${i}" cardNo="${cardResult[i].cardNo}" cardPrice="${cardResult[i].cardPrice}">
                                    <img class="knot" src="images/red_knot.png">
                                    <div class="front">
                                        <img class="badge" src="images/badge.png">
                                        <h3 class="card_name">${cardResult[i].cardName}</h3>
                                        <div class="card_item_box">
                                            <div class="card_item card_item1">
                                                <div class="card_item_image">
                                                    <img src="${cardResult[i].item1Img2Url}">
                                                </div>
                                                <h4 class="card_item_name card_item_name1">${cardResult[i].item1name}</h4>
                                            </div>
                                            <div class="card_item card_item2">
                                                <div class="card_item_image">
                                                    <img src="${cardResult[i].item2Img2Url}">
                                                </div>
                                                <h4 class="card_item_name card_item_name2">${cardResult[i].item2name}</h4>
                                            </div>
                                            <div class="card_item card_item3">
                                                <div class="card_item_image">
                                                    <img src="${cardResult[i].item3Img2Url}">
                                                </div>
                                                <h4 class="card_item_name card_item_name3">${cardResult[i].item3name}</h4>
                                            </div>
                                            <div class="card_item card_item4">
                                                <div class="card_item_image">
                                                    <img src="${cardResult[i].item4Img2Url}">
                                                </div>
                                                <h4 class="card_item_name card_item_name4">${cardResult[i].item4name}</h4>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
    }
    document.getElementsByClassName("responsive")[0].innerHTML = cardInnerHtml;
    console.log(cardInnerHtml);
}