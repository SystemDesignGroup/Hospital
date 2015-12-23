/**
 * Created by lyg11211016 on 15-12-23.
 */

getHospitalInfo();

var hospital,City,Grade,Major;

function getHospitalInfo(){
    //alert(province+"\n"+city+"\n"+major+"\n"+grade);


    var str = location.search;
    var mstr = str.split('?')[1];
    var strArray = mstr.split('&');

    var province = strArray[0].substr(9,strArray[0].length);
    province = decodeURI(province);
    province = decodeURI(province);

    var city = strArray[1].substr(5,strArray[1].length);
    city = decodeURI(city);
    city = decodeURI(city);

    var grade = strArray[2].substr(9,strArray[2].length);
    grade = decodeURI(grade);
    grade = decodeURI(grade);

    var major = strArray[3].substr(11,strArray[3].length);
    major = decodeURI(major);
    major = decodeURI(major);

    searchHospital();

    document.getElementById('result_province').innerHTML=province;
    document.getElementById('result_city').innerHTML=city;
    document.getElementById('result_grade').innerHTML=grade;
    document.getElementById('result_major').innerHTML=major;
}


function byCity(city){
    var xmlHttp;
    var response;
    var hospitallist;

    City=document.getElementById('address').innerHTML;
    //Grade=grade;
    //Major=major;

    hospitallist=document.getElementById('hospitals');
    hospitallist.innerHTML = '';

    xmlHttp=new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status ==200){
            response=eval(xmlHttp.response);
            for(var i=0;i<response.length;i++){
                var listItem="<li class='g-hospital-item J_hospitalItem'>"+
                    "<div class='hos-total'>"+
                    "<div class='info g-left' style='float:left'>"+
                    "<a target='_blank' href='http://www.guahao.com/hospital/5cee04f9-4cc8-4499-a35b-6f37f2dd8a74000' onmousedown='return _smartlog(this,HPTP_1)' class='img' style='float:left'>"+
                    "<img src='../image/pku_hos.jpg' alt='' title=''/>"+
                    "</a>"+
                    "<dl style='float:left;margin-left:0px;text-align:center'>" +
                    "<dt>"+
                    "<a href='' class='name'>" + response[i]['name'] + "</a>" +
                    "<em class='em2'>"+response[i]['grade']+"</em>"+
                    "<img src='http://img.guahao.cn/portal/img/guahao.png'>"+
                    "</dt>"+
                    "<dd>"+
                    "<p class='tel'>"+
                    "<i>"+"</i>"+
                    "<span title=''>"+response[i]['tel']+"</span>"+
                    "</p>"+
                    "<p class='addr'>"+
                    "<i>"+"</i>"+
                    "<span title=''>"+response[i]['address']+"</span>"+
                    "</p>"+
                    "</dd>"+
                    "</dl>"+
                    "<p><label>医院简介：</label>" + response[i]['intro'] + "</p>" +
                    "</div>"+
                    "<div class='comment' style='float:left margin-right:920px;margin-top:200'>"+
                    "累计 <label>133.0万</label> 次预约<div class='pd15'> "+"</div>"+
                    "累计 <label>6.1万</label> 条患者评价"+
                    "</div>"+
                    "</div>"+
                    "<a class='cover-bg' target='_blank' href='http://www.guahao.com/hospital/5cee04f9-4cc8-4499-a35b-6f37f2dd8a74000'>"+"</a>"+
                    " </li>";
            }
        }
    }
    xmlHttp.open("GET","search_by_hos.php?tab="+City,true);
    xmlHttp.send();
}

function byGrade(grade){
    var xmlHttp;
    var response;
    var hospitallist;

    Grade=grade;

    hospitallist=document.getElementById('hospitalList');
    hospitallist.innerHTML = '';

    xmlHttp=new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status ==200){
            response=eval(xmlHttp.response);
            for(var i=0;i<response.length;i++){
                var listItem="<li class='g-hospital-item J_hospitalItem'>"+
                    "<div class='hos-total'>"+
                    "<div class='info g-left' style='float:left'>"+
                    "<a target='_blank' href='http://www.guahao.com/hospital/5cee04f9-4cc8-4499-a35b-6f37f2dd8a74000' onmousedown='return _smartlog(this,HPTP_1)' class='img' style='float:left'>"+
                    "<img src='../image/pku_hos.jpg' alt='' title=''/>"+
                    "</a>"+
                    "<dl style='float:left;margin-left:0px;text-align:center'>" +
                    "<dt>"+
                    "<a href='' class='name'>" + response[i]['name'] + "</a>" +
                    "<em class='em2'>"+response[i]['grade']+"</em>"+
                    "<img src='http://img.guahao.cn/portal/img/guahao.png'>"+
                    "</dt>"+
                    "<dd>"+
                    "<p class='tel'>"+
                    "<i>"+"</i>"+
                    "<span title=''>"+response[i]['tel']+"</span>"+
                    "</p>"+
                    "<p class='addr'>"+
                    "<i>"+"</i>"+
                    "<span title=''>"+response[i]['address']+"</span>"+
                    "</p>"+
                    "</dd>"+
                    "</dl>"+
                    "<p><label>医院简介：</label>" + response[i]['intro'] + "</p>" +
                    "</div>"+
                    "<div class='comment' style='float:left margin-right:920px;margin-top:200'>"+
                    "累计 <label>133.0万</label> 次预约<div class='pd15'> "+"</div>"+
                    "累计 <label>6.1万</label> 条患者评价"+
                    "</div>"+
                    "</div>"+
                    "<a class='cover-bg' target='_blank' href='http://www.guahao.com/hospital/5cee04f9-4cc8-4499-a35b-6f37f2dd8a74000'>"+"</a>"+
                    " </li>";
            }
        }
    }
    xmlHttp.open("GET","search_by_hos.php?tab="+Grade,true);
    xmlHttp.send();
}

function byMajor(major){
    var xmlHttp;
    var response;
    var hospitallist;

    Major=major;

    hospitallist=document.getElementById('hospitalList');
    hospitallist.innerHTML = '';

    xmlHttp=new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status ==200){
            response=eval(xmlHttp.response);
            for(var i=0;i<response.length;i++){
                var listItem="<li class='g-hospital-item J_hospitalItem'>"+
                    "<div class='hos-total'>"+
                    "<div class='info g-left' style='float:left'>"+
                    "<a target='_blank' href='http://www.guahao.com/hospital/5cee04f9-4cc8-4499-a35b-6f37f2dd8a74000' onmousedown='return _smartlog(this,HPTP_1)' class='img' style='float:left'>"+
                    "<img src='../image/pku_hos.jpg' alt='' title=''/>"+
                    "</a>"+
                    "<dl style='float:left;margin-left:0px;text-align:center'>" +
                    "<dt>"+
                    "<a href='' class='name'>" + response[i]['name'] + "</a>" +
                    "<em class='em2'>"+response[i]['grade']+"</em>"+
                    "<img src='http://img.guahao.cn/portal/img/guahao.png'>"+
                    "</dt>"+
                    "<dd>"+
                    "<p class='tel'>"+
                    "<i>"+"</i>"+
                    "<span title=''>"+response[i]['tel']+"</span>"+
                    "</p>"+
                    "<p class='addr'>"+
                    "<i>"+"</i>"+
                    "<span title=''>"+response[i]['address']+"</span>"+
                    "</p>"+
                    "</dd>"+
                    "</dl>"+
                    "<p><label>医院简介：</label>" + response[i]['intro'] + "</p>" +
                    "</div>"+
                    "<div class='comment' style='float:left margin-right:920px;margin-top:200'>"+
                    "累计 <label>133.0万</label> 次预约<div class='pd15'> "+"</div>"+
                    "累计 <label>6.1万</label> 条患者评价"+
                    "</div>"+
                    "</div>"+
                    "<a class='cover-bg' target='_blank' href='http://www.guahao.com/hospital/5cee04f9-4cc8-4499-a35b-6f37f2dd8a74000'>"+"</a>"+
                    " </li>";
            }
        }
    }
    xmlHttp.open("GET","search_by_hos.php?tab="+Major,true);
    xmlHttp.send();
}
