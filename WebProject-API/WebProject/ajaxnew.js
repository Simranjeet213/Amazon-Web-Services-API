function reqListener()
{
    var jsonResponse = JSON.parse(this.responseText);
    var number1 = jsonResponse.first_num;
    var number2 = jsonResponse.second_num;
    var result = jsonResponse.result;

    document.getElementById('rslt').innerText = String(result);

}

function calculationAjax()
{
  debugger;
    var number1=document.getElementById("f_num").value;
    var number2=document.getElementById("s_num").value;
    var op=document.getElementById("operator").value;
    // var url="https://localhost/project/ProjectWS_Final.php?first_num="+number1+"&second_num="+number2+"&operator="+op;
    var url="ProjectWS_final.php?first_num="+encodeURIComponent(formAjax.elements[0].value)+"&second_num="+encodeURIComponent(formAjax.elements[1].value)+"&operator="+encodeURIComponent(formAjax.elements[3].value);

    onRequest.open("GET",url);
    onRequest.send();
}
var onRequest= new XMLHttpRequest();
onRequest.addEventListener("load",reqListener);




// var url = "http://localhost/calculator/ProjectWB.php?first_num="+first_number+"&second_num="+second_number+"&operator="+ope;