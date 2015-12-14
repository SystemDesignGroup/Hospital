/**
 * Created by whx on 2015/12/14.
 */

setuser();

function setuser(){
    var xmlhttp;
    var username;

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){

        if(xmlhttp.readyState==4&&xmlhttp.status==200){
            username = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET","./search/getuserinfo.php",false);
    xmlhttp.send();

    if(username){
        document.getElementById('user').innerHTML = username;
    }else{

    }
}
function jump(text){
    if(text == "登录"){
        window.location.href="login.html";
    }else{
        window.location.href="user.html";
    }
}