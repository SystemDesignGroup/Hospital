/**
 * Created by whx on 2015/12/13.
 */



function search(){
    var hospital,department,province;

    province = document.getElementById('city-label').innerHTML;
    hospital = document.getElementById('hospital').value;
    department = document.getElementById('office').value;

    hospital = encodeURI(hospital);
    hospital = encodeURI(hospital);

    department = encodeURI(department);
    department = encodeURI(department);

    //alert(hospital + " " +department);
    window.location.href="./search/results.html?province="+province+"&city=''&hospital="+hospital+"&department="+department;
}

