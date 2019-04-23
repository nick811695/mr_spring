document.getElementById('close_btn').onclick = function () {
    document.getElementById('chatbotTextWrap').style.display = 'none';
}
document.getElementById('monkeyBot').onclick = function () {
    var chat = document.getElementById('chatbotTextWrap');
    if (chat.style.display == 'none') {
        chat.style.display = 'block';
    } else {
        chat.style.display = 'none';
    }
}



//內容第一層overflow
var content = document.getElementById("chatBot-content");
//內容第二層(包p)
var container = document.getElementById("chatBot-container");
//卷軸維持在最底端
function chatBotScrollTo(container, content) {
    //找到對話框的高度，並設定變數
    let h = container.offsetHeight;
    //送出的同時滾動卷軸到最後一筆留言
    content.scrollTo({
        top: h,
        left: 0,
        behavior: "smooth"
    });
}
var chatUserText = document.getElementsByClassName("chatBot-text")[0];
document.getElementById('chatBot-search').onclick = function () {
    // 檢查input有沒有內容
    if(chatUserText.value == ""){
        return;
    }
    // 取使用者輸入文字
    var userText = document.getElementsByClassName('chatBot-text')[0].value;
    //創造元素
    var node = document.createElement("p");
    //定義元素樣式
    node.id = "chatBot-content-B";
    //創造節點
    var textnode = document.createTextNode(userText);
    node.appendChild(textnode);
    document.getElementById("chatBot-container").appendChild(node);
    //清空輸入區
    chatUserText.value = "";
    //卷軸更新
    chatBotScrollTo(container, content);
}
document.getElementById('chatBot-search').onclick = function () {
    // 檢查input有沒有內容
    if(chatUserText.value == ""){
        return;
    }
    // 取使用者輸入文字
    var userText = document.getElementsByClassName('chatBot-text')[0].value;
    //創造元素
    var node = document.createElement("p");
    //定義元素樣式
    node.id = "chatBot-content-B";
    //創造節點
    var textnode = document.createTextNode(userText);
    node.appendChild(textnode);
    document.getElementById("chatBot-container").appendChild(node);
    //清空輸入區
    chatUserText.value = "";
    //卷軸更新
    chatBotScrollTo(container, content);
}