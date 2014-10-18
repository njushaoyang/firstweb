/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function onloadimg() {
    document.getElementById("imgwrapper").style.display="block";
}
function startUpload() {
    return true;
}
function stopUpload(rel) {
    alert(rel);
    document.getElementById("imgwrapper").style.display="none";
    document.getElementById("question").innerHTML+="<img alt='error' src="+rel+">"+"</img>";
}
function askQuestion() {
    if (document.getElementById("opacitytop").style.display == "none") {
        document.getElementById("opacitytop").style.display = "block";
        document.getElementById("askwrapper").style.display = "block";
    }
    return true;
}
function closeimg(){
    document.getElementById("imgwrapper").style.display="none";
}
function closeask(){
    document.getElementById("askwrapper").style.display="none";
    document.getElementById("opacitytop").style.display="none";
}
function changecolor(obj,id){
    checkobj=document.getElementById(id); 
    if(checkobj.checked==false){
        checkobj.checked=true;
        obj.style.backgroundColor="blue";
    }else{
        checkobj.checked=false;
        obj.style.backgroundColor="#b3cee1";
    }
}