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

    var b = location.href;
    var l = b.split('/')[4];
    if(l=='home.html'){
        xmlhttp.open("GET","./search/getuserinfo.php",false);
    }else{
        xmlhttp.open("GET","../search/getuserinfo.php",false);
    }
    xmlhttp.send();

    if(username){
        document.getElementById('user').innerHTML = username;
    }else{

    }
}
function jump(text){
    if(text == "登录"){
        var b = location.href;
        var l = b.split('/')[4];
        if(l=='home.html'){
            window.location.href="login.html";
        }else{
            window.location.href='../login.html';
        }

    }else{
        var b = location.href;
        var l = b.split('/')[4];
        if(l=='home.html'){
            window.location.href="./user/userorder.php";
        }else{
            window.location.href="../user/userorder.php";
        }

    }
}