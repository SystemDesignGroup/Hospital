/**
 * Created by ìÏ on 2015/12/20.
 */
window.onload=init;
function init()
{
    var length=document.getElementsByClassName("tabnav-tab").length;
    console.log(length);
    for(var i=0;i<length;i++)
    {
        var tab=document.getElementsByClassName("tabnav-tab")[i];
        //console.log(tab);
        tab.onmousedown=setRefAttribute(tab);
        //if(tab.getAttribute("selected")=="true") break;
    }

    $('.J_ProvinceUl li a').click(function()
    {
        var text=$(this).text();
        $("#city-label").html(text);

    });
    $('.J_HotCity ul li a').click(function()
    {
        var text=$(this).text();
        $("#city-label").html(text);

    });
}

function setRefAttribute(tab)
{
    var isSelected=tab.getAttribute("selected");
    //console.log(tab.getAttribute("selected"));
    if(isSelected=="true")
    {
        /*console.log(tab);*/
        tab.style.color="#018bba";
        tab.style.backgroundColor="#fff";
        tab.style.borderColor="#ddd";
        tab.style.borderRadius="3px 3px 0 0";
    }
}

function showCityList()
{
    var div=document.getElementById("city-list");
    console.log("Get div");
    div.style.display="block";
}

function hideCityList()
{
    var div=document.getElementById("city-list");
    console.log("Get div");
    div.style.display="none";
}