/**
 * Created by whx on 2015/12/5.
 */

getDoctorInfo();

function getDoctorInfo(){
    //alert(province+"\n"+city+"\n"+hospital+"\n"+department);

    var str = location.search;
    var mstr = str.split('?')[1];
    var strArray = mstr.split('&');

    //var province = strArray[0].substr(9,strArray[0].length);
    //province = decodeURI(province);
    //province = decodeURI(province);
    //
    //var city = strArray[1].substr(5,strArray[1].length);
    //city = decodeURI(city);
    //city = decodeURI(city);

    var hospital = strArray[0].substr(9,strArray[0].length);
    hospital = decodeURI(hospital);
    hospital = decodeURI(hospital);

    var department = strArray[1].substr(11,strArray[1].length);
    department = decodeURI(department);
    department = decodeURI(department);

    searchDoctor(hospital,department);

}
function searchDoctor(hospital,department){
    var xmlHttp,response;
    var docList,docCount;

    //docDiv = document.getElementById('mainmain');
    docList = document.getElementById('docList');
    docCount = document.getElementById('J_ResultNum');

    xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
            response = eval(xmlHttp.response);

            docCount.innerHTML = response.length;

            for(var i = 0;i<response.length;i++){

                var listItem = "<li class='J_ListItem'>"+
                "<div class='doc-box' style='display:inline;height:120px'>"+
                    "<div class='doc-info' style='float:left;width:50%;display:inline;height:120px'>"+
                    "<div class='doc-base-info' style='float:left;width:45%;display:inline'>"+
                    "<a target='_blank'  href=''onmousedown='return _smartlog(this,'DOCP_1')' class='img' style='float:left'>"+
                    "<div hidden='hidden' id='docId'>"+response[i]['id']+"</div>"+
                    "<img src='../image/touxiang.png' alt='' title=''  onerror='' style='width: 90px;height: 90px'/>"+
                    "</a>"+
                    "<dl style='float:left;margin-left:0px;text-align:center'>"+
                    "<dt>"+
                    "<a href='' class='name'>"+response[i]['name']+"</a>"+
                    "</dt>"+
                    "<dd>"+
                    "<p class='doc-grade'><span class='level'>xx医师</span></p>"+
                    "<p class='doc-hosp-dept'>"+
                    "<a href=''>"+response[i]['department_id']+"</a>"+
                    "</p>"+
                    "</dd>"+
                    "</dl>"+
                    "</div>"+
                    "<div class='doc-skill' style='float:right;margin-right:20px;width:45%'>"+
                    "<p><label>擅长：</label>"+response[i]['intro']+"</p>"+
                "</div>"+
                "</div>"+
                "<div class='doc-data' style='float:left;width:20%;display:inline;margin-left:20px;height:120px'>"+
                    "<div class='order-num' style='float:left;width:30%'>"+
                    "<p class='num'>1000</p>"+
                    "<p>预约量</p>"+
                    "</div>"+
                    "<div class='doc-comment' style='margin-left:80px;width:40%'>"+
                    "<p><label>疗效：</label><span>250%</span></p>"+
                "<p><label>态度：</label><span>250%</span></p>"+
                "</div>"+
                "</div>"+
                "<div class='doc-shiftcase J_ShiftCaseContent' style='float:right;margin-right:30px;width:20%;height:120px'>"+
                    "<div class='to-center' style='margin-top:60px;display:inline'>"+
                    "<a class='gbb gbt-blue addpadding' href='#' style='margin-left:10px' onclick='guahao("+response[i]['id']+")'>挂号</a>"+
                    "<a class='gbb gbt-blue addpadding' href='#' style='margin-left:10px' onclick='consult()'>咨询</a>"+
                    "</div>"+
                    "</div>"+
                    "<div class='clear'></div>"+
                    "</div>"+
                    "</li>";

                docList.innerHTML += listItem;

                //alert(response[i]["name"]+"\n");

                //docList.append(listItem);
            }
        }
    };

    xmlHttp.open("GET","search_doctor.php?hospital="+hospital+"&department="+department,true);
    xmlHttp.send();
}
function guahao(doctor_id){
    var xmlhttp;
    var user_id;
    var date;

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){

        if(xmlhttp.readyState==4&&xmlhttp.status==200){
            user_id = xmlhttp.responseText;
        }
    }


    xmlhttp.open("GET","getuserinfo.php",true);
    xmlhttp.send();

    if(!user_id){
        var r = confirm("请先登录！");
        if(r==true){
            window.location.href='../login.html';
        }else{

        }
    }else{
        date = document.getElementById('date1').value;
        //doctor_id = document.getElementById('docId').innerHTML;
        //alert(doctor_id);
        addOrder(user_id,doctor_id,date);
    }
}
function addOrder(user_id,doctor_id,date){
    var xmlhttp;

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){

        if(xmlhttp.readyState==4&&xmlhttp.status==200){
            alert(xmlhttp.responseText);
        }
    }

    xmlhttp.open("GET","addorder.php?user_id="+user_id+"&doctor_id="+doctor_id+"&date="+date,true);
    xmlhttp.send();
}
function consult(){
    alert("咨询")
}