/**
 * Created by whx on 2015/12/19.
 */
function doctor_date(){
    var date = document.getElementById('EntTime');

    var xmlHttp,response;
    var docCount;var docList;

    //docDiv = document.getElementById('mainmain');
    docList = document.getElementById('docList');
    docCount = document.getElementById('J_ResultNum');

    docList.innerHTML = '';

    xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            response = eval(xmlHttp.response);

            docCount.innerHTML = response.length;

            for (var i = 0; i < response.length; i++) {
                var zhicheng;
                if (response[i]['grade_id'] == '4') {
                    zhicheng = '主任医师';
                } else if (response[i]['grade_id'] == '5') {
                    zhicheng = '副主任医师';
                } else if (response[i]['grade_id'] == '6') {
                    zhicheng = '主治医师';
                }
                var listItem = "<li class='J_ListItem'>" +
                    "<div class='doc-box' style='display:inline;height:120px'>" +
                    "<div class='doc-info' style='float:left;width:50%;display:inline;height:120px'>" +
                    "<div class='doc-base-info' style='float:left;width:45%;display:inline'>" +
                    "<a target='_blank'  href=''onmousedown='return _smartlog(this,'DOCP_1')' class='img' style='float:left'>" +
                    "<img src='../image/touxiang.png' alt='' title=''  onerror='' style='width: 90px;height: 90px'/>" +
                    "</a>" +
                    "<dl style='float:left;margin-left:0px;text-align:center'>" +
                    "<dt>" +
                    "<a href='' class='name'>" + response[i]['name'] + "</a>" +
                    "</dt>" +
                    "<dd>" +
                    "<p class='doc-grade'>" + zhicheng + "</p>" +
                    "<p class='doc-hosp-dept'>" +
                    "<a href=''>" + response[i]['department_id'] + "</a>" +
                    "</p>" +
                    "</dd>" +
                    "</dl>" +
                    "</div>" +
                    "<div class='doc-skill' style='float:right;margin-right:20px;width:45%'>" +
                    "<p><label>擅长：</label>" + response[i]['intro'] + "</p>" +
                    "</div>" +
                    "</div>" +
                    "<div class='doc-data' style='float:left;width:20%;display:inline;margin-left:20px;height:120px'>" +
                    "<div class='order-num' style='float:left;width:30%'>" +
                    "<p class='num'>1000</p>" +
                    "<p>预约量</p>" +
                    "</div>" +
                    "<div class='doc-comment' style='margin-left:80px;width:40%'>" +
                    "<p><label>疗效：</label><span>250%</span></p>" +
                    "<p><label>态度：</label><span>250%</span></p>" +
                    "</div>" +
                    "</div>" +
                    "<div class='doc-shiftcase J_ShiftCaseContent' style='float:right;margin-right:30px;width:20%;height:120px'>" +
                    "<div class='to-center' style='margin-top:60px;display:inline'>" +
                    "<a class='gbb gbt-blue addpadding' href='#' style='margin-left:10px' onclick='guahao(" + response[i]['id'] + ")'>挂号</a>" +
                    "<a class='gbb gbt-blue addpadding' href='#' style='margin-left:10px' onclick='consult()'>咨询</a>" +
                    "</div>" +
                    "</div>" +
                    "<div class='clear'></div>" +
                    "</div>" +
                    "</li>";

                docList.innerHTML += listItem;
            }
        }
    }
    xmlHttp.open("GET","search_doctor.php?hospital="+hospital+"&department="+department+"&grade="+zhicheng,true);
    xmlHttp.send();
}