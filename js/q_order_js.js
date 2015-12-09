/**
 * Created by whx on 2015/12/4.
 */


function init()
{
    var length=document.getElementsByClassName("tabnav-tab").length;
    console.log(length);
    for(var i=0;i<length;i++)
    {
        var tab=document.getElementsByClassName("tabnav-tab")[i];
        console.log(tab);
        tab.onmousedown=setRefAttribute(tab);
        if(tab.getAttribute("selected")=="true") break;
    }
}

function setRefAttribute(tab)
{
    var isSelected=tab.getAttribute("selected");
    console.log(tab.getAttribute("selected"));
    if(isSelected=="true")
    {
        console.log(tab);
        tab.style.color="#333";
        tab.style.backgroundColor="#fff";
        tab.style.borderColor="#ddd";
        tab.style.borderRadius="3px 3px 0 0";
    }
}
function provinceChange(obj){

    var province = obj.options[obj.selectedIndex].innerHTML;
    var xmlHttp,resDoc;
    var city,hospital,department;

    city = document.getElementById('city');
    city.options.length = 1;
    hospital = document.getElementById('hospital');
    hospital.options.length = 1;
    department = document.getElementById('department');
    department.options.length = 1;

    xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
            resDoc = eval(xmlHttp.response);

            for(var i = 0;i<resDoc.length;i++){
                option = document.createElement('option');
                option.text = resDoc[i]["name"];
                //alert(option.text);
                city.add(option,null);
            }
        }
    }
    xmlHttp.open("GET","../search/quickorder.php?province="+province,true);
    xmlHttp.send();
}
function cityChange(obj){
    var city = obj.options[obj.selectedIndex].innerHTML;
    var xmlHttp,resDoc;
    var hospital,department;

    hospital = document.getElementById('hospital');
    hospital.options.length = 1;
    department = document.getElementById('department');
    department.options.length = 1;

    xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
            resDoc = eval(xmlHttp.response);

            for(var i = 0;i<resDoc.length;i++){
                option = document.createElement('option');
                option.text = resDoc[i]["name"];
                //alert(option.text);
                hospital.add(option,null);
            }
        }
    }
    xmlHttp.open("GET","../search/quickorder.php?city="+city,true);
    xmlHttp.send();
}
function hospitalChange(obj){
    var hospital = obj.options[obj.selectedIndex].innerHTML;
    var xmlHttp,resDoc;
    var department;

    department = document.getElementById('department');
    department.options.length = 1;

    xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
            resDoc = eval(xmlHttp.response);

            for(var i = 0;i<resDoc.length;i++){
                option = document.createElement('option');
                option.text = resDoc[i]["name"];
                //alert(option.text);
                department.add(option,null);
            }
        }
    }
    xmlHttp.open("GET","../search/quickorder.php?hospital="+hospital,true);
    xmlHttp.send();
}
function departmentChange(obj){

}
function goOrder(){

    var province = document.getElementById('province').options[document.getElementById('province')
        .selectedIndex].innerHTML;
    province = encodeURI(province);
    province = encodeURI(province);

    var city = document.getElementById('city').options[document.getElementById('city')
        .selectedIndex].innerHTML;
    city = encodeURI(city);
    city = encodeURI(city);

    var hospital = document.getElementById('hospital').options[document.getElementById('hospital')
        .selectedIndex].innerHTML;
    hospital = encodeURI(hospital);
    hospital = encodeURI(hospital);

    var department = document.getElementById('department').options[document.getElementById('department')
        .selectedIndex].innerHTML;
    department = encodeURI(department);
    department = encodeURI(department);

    window.location.href="results.html?province="+province+"&city="+city+
    "&hospital="+hospital+"&department="+department;

}