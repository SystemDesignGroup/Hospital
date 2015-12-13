/**
 * Created by whx on 2015/12/13.
 */

function search(){
    var hospital,department;

    hospital = document.getElementById('hospital').value;
    department = document.getElementById('office').value;

    hospital = encodeURI(hospital);
    hospital = encodeURI(hospital);

    department = encodeURI(department);
    department = encodeURI(department);

    //alert(hospital + " " +department);
    window.location.href="./search/results.html?hospital="+hospital+"&department="+department;
}
