/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function vote() {
    var address = document.getElementById("voteaddress").value;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        xhr = new ActiveObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText.replace(/^\s*|\s*$/g, '');
            if (result == "failed") {
                alert("您已经赞同过了");
            } else if (result == "success") {
                var str = document.getElementById("votenumber").innerHTML;
                var s = str.split(" ");
                var num = parseInt(s[1]);
                num++;
                document.getElementById("votenumber").innerHTML = "赞同数： "+num;
            }
        }
    }
    xhr.open("GET", "../php/vote.php?address=" + address, true);
    xhr.send(null);
}

