/**
 * Created by whx on 2015/12/13.
 */


search_r();
function search_r(){

    var str = location.search;
    var mstr = str.split('?')[1];

    var key = mstr.substr(4,mstr.length);
    key = decodeURI(key);
    key = decodeURI(key);

    var xmlHttp,response;
    var docList,hosList,depList;

    //docDiv = document.getElementById('mainmain');
    //alert(key);
    hosList = document.getElementById('hospitals');
    depList = document.getElementById('departments');
    docList = document.getElementById('doctors');
    //docCount = document.getElementById('J_ResultNum');

    hosList.innerHTML = '';
    depList.innerHTML = '';
    docList.innerHTML = '';

    xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
            response = eval(xmlHttp.response);

            if(response[0].length>0){

                for(var j=0;j<response[0].length;j++){
                    var listItem = "<li class='J_ListItem'>"+
                    		"<div class='hos-content' style='height:170px;margin-left:60px;margin-right:80px;background-color:#F0FFF0;border:0.5px;solid gray;display:block'>"+
                        "<div class='detail word-break' style='float:left;margin-left:40px;width:40%'>"+
                        "<h2>"+
                        "<strong><a href=''>"+response[0][j]['h_name']+"</a></strong>"+
                        "<span style='font-size:18px;color:#8B8B8B'>&nbsp;&nbsp;"+response[0][j]['detail']+"</span>"+
                        "</h2>"+
                    "<div class='address'>"+
                        "<b>地址：</b>"+
                    "<span title=''>"+
                        response[0][j]['address']+
                    "</span>"+
                    "</div>"+
                    "<div class='tel'>"+
                        "<b>电话：</b>"+
                    "<span>"+response[0][j]['tel']+"</span>"+
                    "</div>"+
                    "<div class='website'>"+
                        "<b>简介：</b>"+
                    "<span>&nbsp;"+response[0][j]['intro']+"</span>"+
                        "</div>"+
                    "</div>"+
                    "</div>"+
                    "</li>";

                    hosList.innerHTML += listItem;
                }
            }
            if(response[1].length>0){

                for(var j=0;j<response[1].length;j++){

                    var listItem = "<li >"+
                            "<div style='border-bottom:1px solid #DBDBDB'>" +
                            "<a>"+response[1][j]['d_name']+"</a>"+
                            "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+response[1][j]['intro']+"</p>"+
                        "</div>"+
                            "</li>";

                    depList.innerHTML += listItem;
                }
            }
            if(response[2].length>0){
                for(var j=0;j<response[2].length;j++){
                    var listItem = "<li class='J_ListItem'>"+
                        "<div class='doc-box' style='display:inline;height:120px'>"+
                        "<div class='doc-info' style='float:left;width:45%;display:inline;height:100px;border-bottom:1px solid #DBDBDB'>"+
                        "<div class='doc-base-info' style='float:left;width:53%;display:inline'>"+
                        "<a target='_blank'  href=''onmousedown='return _smartlog(this,'DOCP_1')' class='img' style='float:left'>"+
                        "<img src='../image/touxiang.png' alt='' title=''  onerror='' style='width: 90px;height: 90px'/>"+
                        "</a>"+
                        "<dl style='float:left;margin-left:0px;text-align:center'>"+
                        "<dt>"+
                        "<a href='' class='name'>"+response[2][j]['dc_name']+"</a>"+
                        "</dt>"+
                        "<dd>"+
                        "<p class='doc-grade'>"+response[2][j]['detail']+"</p>"+
                        "<p class='doc-hosp-dept'>"+
                        "<a href=''>"+response[2][j]['dp_name']+"</a>"+
                        "</p>"+
                        "</dd>"+
                        "</dl>"+
                        "</div>"+
                        "<div class='doc-skill' style='float:right;margin-right:0px;width:43%'>"+
                        "<p><label>擅长：</label>"+response[2][j]['intro']+"</p>"+
                        "</div>"+
                        "</div>"+
                        "<div class='doc-data' style='float:left;width:30%;display:inline;margin-left:20px;height:100px;border-bottom:1px solid #DBDBDB'>"+
                        "<div class='order-num' style='float:left;width:30%'>"+
                        "<p class='num'>预约量：1000</p>"+
                        "</div>"+
                        "<div class='doc-comment' style='float:right;width:45%'>"+
                        "<p><label>疗效：</label><span>250%</span></p>"+
                        "<p><label>态度：</label><span>250%</span></p>"+
                        "</div>"+
                        "</div>"+
                        "<div class='doc-shiftcase J_ShiftCaseContent' style='float:right;margin-right:30px;width:18%;height:100px;border-bottom:1px solid #DBDBDB'>"+
                        "<div class='to-center' style='margin-top:60px;display:inline'>"+
                        "</div>"+
                        "</div>"+
                        "<div class='clear'></div>"+
                        "</div>"+
                        "</li>";

                    docList.innerHTML += listItem;
                }

            }

        }
    };

    xmlHttp.open("GET","search_by_key.php?key="+key,true);
    xmlHttp.send();
    //alert(search_key_t);
}

