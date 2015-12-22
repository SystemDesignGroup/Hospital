/**
 * Created by xjf13211016 on 15-12-20.
 */

var hospital,department;
var date= document.getElementById('EntTime').value;

function showdoc(keshi){
    var xmlHttp;
    var response;
    var doctorlist;
    department=keshi;

    docList=document.getElementById('doctorList');
    docList.innerHTML = '';

    xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
            response = eval(xmlHttp.response);

            for(var i = 0;i<response.length;i++){
                var zhicheng;
                if(response[i]['grade_id']=='4'){
                    zhicheng = '主任医师';
                }else if(response[i]['grade_id']=='5'){
                    zhicheng = '副主任医师';
                }else if(response[i]['grade_id']=='6'){
                    zhicheng = '主治医师';
                }
                var listItem = "<li class='J_ListItem'>"+
                    "<div class='doc-box' style='display:inline;height:120px'>"+
                    "<div class='doc-info' style='float:left;width:45%;display:inline;height:100px;border-bottom:1px solid #DBDBDB'>"+
                    "<div class='doc-base-info' style='float:left;width:53%;display:inline'>"+
                    "<a target='_blank'  href=''onmousedown='return _smartlog(this,'DOCP_1')' class='img' style='float:left'>"+
                    "<img src='../image/touxiang.png' alt='' title=''  onerror='' style='width: 90px;height: 90px'/>"+
                    "</a>"+
                    "<dl style='float:left;margin-left:0px;text-align:center'>"+
                    "<dt>"+
                    "<a href='' class='name'>"+response[i]['name']+"</a>"+
                    "</dt>"+
                    "<dd>"+
                    "<p class='doc-grade'>"+zhicheng+"</p>"+
                    "<p class='doc-hosp-dept'>"+
                    "<a href=''>"+department+"</a>"+
                    "</p>"+
                    "</dd>"+
                    "</dl>"+
                    "</div>"+
                    "<div class='doc-skill' style='float:right;margin-right:0px;width:43%'>"+
                    "<p><label>擅长：</label>"+response[i]['intro']+"</p>"+
                    "</div>"+
                    "</div>"+
                    "<div class='doc-data' style='float:left;width:30%;display:inline;margin-left:20px;height:100px;border-bottom:1px solid #DBDBDB'>"+
                    "<div class='order-num' style='float:left;width:30%'>"+
                    "<p class='num'>预约量：1000</p>"+
                    "<p class='order_num'>可预约量: "+response[i]['tickets']+"</p>"+
                    "</div>"+
                    "<div class='doc-comment' style='float:right;width:45%'>"+
                    "<p><label>疗效：</label><span>250%</span></p>"+
                    "<p><label>态度：</label><span>250%</span></p>"+
                    "</div>"+
                    "</div>"+
                    "<div class='doc-shiftcase J_ShiftCaseContent' style='float:right;margin-right:30px;width:18%;height:100px;border-bottom:1px solid #DBDBDB'>"+
                    "<div class='to-center' style='margin-top:60px;display:inline'>"+
                    "<a class='gbb gbt-blue addpadding' href='#' style='margin-left:10px' onclick='guahao("+response[i]['id']+")'>挂号</a>"+
                    "<a class='gbb gbt-blue addpadding' href='#' style='margin-left:10px' onclick='consult()'>咨询</a>"+
                    "</div>"+
                    "</div>"+
                    "<div class='clear'></div>"+
                    "</div>"+
                    "</li>";

                docList.innerHTML += listItem;
            }
        }
    }
    xmlHttp.open("GET","search_by_department.php?tab="+department+"&liebie=doc",true);
    xmlHttp.send();
}
function showhos(keshi){
    var xmlHttp;
    var response;
    var hospitallist;

    department=keshi;

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
                    "<span title=''>"+responese[i]['tel']+"</span>"+
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
    xmlHttp.open("GET","search_by_department.php?tab="+department+"&liebie=hos",true);
    xmlHttp.send();
}
