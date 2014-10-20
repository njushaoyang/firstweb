/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function onloadimg() {
    document.getElementById("imgwrapper").style.display = "block";
}
function startUpload() {
    return true;
}
function stopUpload(rel) {
    alert(rel);
    document.getElementById("imgwrapper").style.display = "none";
    document.getElementById("question").innerHTML += "<img alt='error' src=" + rel + ">" + "</img>";
}
function askQuestion() {
    if (document.getElementById("opacitytop").style.display == "none") {
        document.getElementById("opacitytop").style.display = "block";
        document.getElementById("askwrapper").style.display = "block";
    }
    return true;
}
function closeimg() {
    document.getElementById("imgwrapper").style.display = "none";
}
function closeask() {
    document.getElementById("askwrapper").style.display = "none";
    document.getElementById("opacitytop").style.display = "none";
}
function changecolor(obj, id) {
    checkobj = document.getElementById(id);
    if (checkobj.checked == false) {
        checkobj.checked = true;
        obj.style.backgroundColor = "#00DDDD";
    } else {
        checkobj.checked = false;
        obj.style.backgroundColor = "#b3cee1";
    }
}
function resetInput() {
    document.getElementById("topic-input").value = "";
    document.getElementById("question").innerHTML = "";
    document.getElementById("score").value = "";
    var item = document.getElementsByName("check-box");
    for (i = 0; i < item.length; i++) {
        item[i].checked=false;
    }
    //将标签div颜色换回去
    closeask();
}
function createXML() {
    var xml = "<?xml version='1.0' ?>";
    var str=document.getElementById("topic-input").value;
    if (str.length>128||str.length==0) {
        alert("请正确输入标题");
        return;
    }
    var title = "<title><![CDATA[" + document.getElementById("topic-input").value + "]]></title>";
    var tags = "";
    var item = document.getElementsByName("check-box");
    for (i = 0; i < item.length; i++) {
        if (item[i].checked)
            tags = tags + "<tag>" + item[i].value + "</tag>";
    }
    var author = "<author>" + document.getElementById("username").value + "</author>";
    var d = new Date();
    var time = "<time>" + d.getFullYear() + " " + (d.getMonth() + 1) + " " + d.getDate() + "</time>";
    var vote = "<vote>" + 0 + "</vote>";
    var content = "<content><![CDATA[" + document.getElementById("question").innerHTML + "]]></content>";
    pattern = /(^[1-9]\d*$)|0/;
    if (!pattern.test(document.getElementById("score").value)) {
        alert("请正确输入分数");
        return;
    }
    var score="<score>"+document.getElementById("score").value+"</score>";
    xml = xml + "<question>" + title + tags + author + time + vote + content + score + "</question>";
    var xmlpara = "title=" + document.getElementById("topic-input").value + "&xml=" + xml + "&author=" + document.getElementById("username").value;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        xhr = new ActiveObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText.replace(/^\s*|\s*$/g, '');
            if (result == "failed") {
            } else if (result == "success") {
                window.location.href="myquestion.php";
            }
        }
    }
    xhr.open("POST", "question.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(xmlpara);
}
function submitInput() {
    createXML();

}