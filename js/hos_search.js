/**
 * Created by lyg11211016 on 15-12-23.
 */

//getHospitalInfo();

var hospital,City,Grade,Major;

Grade = '';Major='';
City=document.getElementById('city-label').innerHTML;

byCity(City);

function byCity(city){
    var xmlHttp;
    var response;
    var hospitallist;

    City = city;
    //Grade=grade;
    //Major=major;

    hospitallist=document.getElementById('hospitals');
    hospitallist.innerHTML = '';

    xmlHttp=new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status ==200){
            response=eval(xmlHttp.response);
            document.getElementById('J_ResultNum').innerHTML = response.length;
            for(var i=0;i<response.length;i++){
                var listItem =
                    "<li class='g-hospital-item J_hospitalItem'>" +
                    "<div class='hos-total' style='width:100%;height:145px;border-bottom:1px solid #DBDBDB'>" +
                    "<div class='info g-left' style='float:left'>" +
                    "<a target='_blank' href='#' onmousedown='return _smartlog(this,'HPTP_1')' class='img' style='float:left'>" +
                    "<img src='http://img.guahao.cn/images/hospital/hlarge_5cee04f9-4cc8-4499-a35b-6f37f2dd8a74.gif' alt='中国人民解放军总医院301医院' title='中国人民解放军总医院301医院' />" +
                    "</a>" +
                    "<dl style='float:left'>" +
                    "<dt>" +
                    "<a class='a' href='' onmousedown='return _smartlog(this,'HPTN_1')'target='blank' title='中国人民解放军总医院301医院'>"+response[i]['name']+"</a>" +
                    "<em class='em2'>"+Grade+"</em>" +
                    "<img src='http://img.guahao.cn/portal/img/guahao.png'>" +
                    "</dt>" +
                    "<dd>" +
                    "<p class='tel'>" +
                    "<i></i>" +
                    "<span title='010-68182255'>"+response[i]['tel']+"</span>" +
                    "</p>" +
                    "<p class='addr'>" +
                    "<i></i>" +
                    "<span title='北京市海淀区复兴路28号'>"+response[i]['address']+"</span>" +
                    "</p>" +

                    "</dd>" +
                    "</dl>" +
                    "</div>" +
                    "<div class='comment'style='float:right;margin-right:100px;margin-top:40px'>" +
                    "累计 <label>133.0万</label> 次预约<div class='pd15'> </div>" +
                    "累计 <label>6.1万</label> 条患者评价" +
                    "</div>" +
                    "</div>" +
                    "</li>";

                hospitallist.innerHTML += listItem;
            }
        }
    }
    xmlHttp.open("GET","search_by_hos.php?city="+city+"&tab=&major=",true);
    xmlHttp.send();
}

function byGrade(grade){
    var xmlHttp;
    var response;
    var hospitallist;

    Grade=grade;

    hospitallist=document.getElementById('hospitals');
    hospitallist.innerHTML = '';

    xmlHttp=new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status ==200){
            response=eval(xmlHttp.response);
            document.getElementById('J_ResultNum').innerHTML = response.length;
            for(var i=0;i<response.length;i++){
                var listItem =
                    "<li class='g-hospital-item J_hospitalItem'>" +
                    "<div class='hos-total' style='width:100%;height:145px;border-bottom:1px solid #DBDBDB'>" +
                    "<div class='info g-left' style='float:left'>" +
                    "<a target='_blank' href='#' onmousedown='return _smartlog(this,'HPTP_1')' class='img' style='float:left'>" +
                    "<img src='http://img.guahao.cn/images/hospital/hlarge_5cee04f9-4cc8-4499-a35b-6f37f2dd8a74.gif' alt='中国人民解放军总医院301医院' title='中国人民解放军总医院301医院' />" +
                    "</a>" +
                    "<dl style='float:left'>" +
                    "<dt>" +
                    "<a class='a' href='' onmousedown='return _smartlog(this,'HPTN_1')'target='blank' title='中国人民解放军总医院301医院'>"+response[i]['name']+"</a>" +
                    "<em class='em2'>"+Grade+"</em>" +
                    "<img src='http://img.guahao.cn/portal/img/guahao.png'>" +
                    "</dt>" +
                    "<dd>" +
                    "<p class='tel'>" +
                    "<i></i>" +
                    "<span title='010-68182255'>"+response[i]['tel']+"</span>" +
                    "</p>" +
                    "<p class='addr'>" +
                    "<i></i>" +
                    "<span title='北京市海淀区复兴路28号'>"+response[i]['address']+"</span>" +
                    "</p>" +

                    "</dd>" +
                    "</dl>" +
                    "</div>" +
                    "<div class='comment'style='float:right;margin-right:100px;margin-top:40px'>" +
                    "累计 <label>133.0万</label> 次预约<div class='pd15'> </div>" +
                    "累计 <label>6.1万</label> 条患者评价" +
                    "</div>" +
                    "</div>" +
                    "</li>";

                hospitallist.innerHTML += listItem;
            }
        }
    }
    xmlHttp.open("GET","search_by_hos.php?tab="+grade+"&major=&city="+City,true);
    xmlHttp.send();
}

function byMajor(major){
    var xmlHttp;
    var response;
    var hospitallist;

    Major = major;
    hospitallist=document.getElementById('hospitals');
    hospitallist.innerHTML = '';

    xmlHttp=new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status ==200) {
            response = eval(xmlHttp.response);
            document.getElementById('J_ResultNum').innerHTML = response.length;
            for (var i = 0; i < response.length; i++) {
                var listItem =
                    "<li class='g-hospital-item J_hospitalItem'>" +
                    "<div class='hos-total' style='width:100%;height:145px;border-bottom:1px solid #DBDBDB'>" +
                    "<div class='info g-left' style='float:left'>" +
                    "<a target='_blank' href='#' onmousedown='return _smartlog(this,'HPTP_1')' class='img' style='float:left'>" +
                    "<img src='http://img.guahao.cn/images/hospital/hlarge_5cee04f9-4cc8-4499-a35b-6f37f2dd8a74.gif' alt='中国人民解放军总医院301医院' title='中国人民解放军总医院301医院' />" +
                    "</a>" +
                    "<dl style='float:left'>" +
                    "<dt>" +
                    "<a class='a' href='' onmousedown='return _smartlog(this,'HPTN_1')'target='blank' title='中国人民解放军总医院301医院'>"+response[i]['name']+"</a>" +
                    "<em class='em2'>"+Grade+"</em>" +
                    "<img src='http://img.guahao.cn/portal/img/guahao.png'>" +
                    "</dt>" +
                    "<dd>" +
                    "<p class='tel'>" +
                    "<i></i>" +
                    "<span title='010-68182255'>"+response[i]['tel']+"</span>" +
                    "</p>" +
                    "<p class='addr'>" +
                    "<i></i>" +
                    "<span title='北京市海淀区复兴路28号'>"+response[i]['address']+"</span>" +
                    "</p>" +

                    "</dd>" +
                    "</dl>" +
                    "</div>" +
                    "<div class='comment'style='float:right;margin-right:100px;margin-top:40px'>" +
                    "累计 <label>133.0万</label> 次预约<div class='pd15'> </div>" +
                    "累计 <label>6.1万</label> 条患者评价" +
                    "</div>" +
                    "</div>" +
                    "</li>";

                hospitallist.innerHTML += listItem;
            }
        }
    }
    xmlHttp.open("GET","search_by_hos.php?tab=&major="+major+"&city="+City,true);
    xmlHttp.send();
}
