var xhr = new  XMLHttpRequest();

xhr.onreadystatechange=function (){
    if( xhr.readyState == 4){
        if( xhr.status == 200 ){
            if(xhr.responseText=='1'){
                // 原程式後續function
            }else{
                // 出現要求登入提示
            }
        }else{
        alert( xhr.status );
        }
    }
}
var url = "login_or_not.php?";

xhr.open("Get", url, true);
xhr.send( null );
