function login(){
    var email=document.getElementById("logemail").value;
    var password=document.getElementById("logpassword").value;
    var para="email="+email+"&password="+password;
    if((email=="")||(password==""))
        return false;
    var xhr;
    if(window.XMLHttpRequest){
        xhr=new XMLHttpRequest();
    }else{
        xhr=new ActiveObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4&&xhr.status==200){
        	var result=xhr.responseText.replace(/^\s*|\s*$/g, '');
            if (result=="failed"){
                document.getElementById("logres").style.display="block"; 
            }else if(result=="success"){
                window.location.href="php/home.php"; 
            }
            
        }
            
    }
    xhr.open("POST","php/login.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send(para);
}

function register(){
    var name=document.getElementById("name").value;
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    if((email=="")||(name=="")||(password==""))
        return false;
    var para="name="+name+"&email="+email+"&password="+password;
    var xhr;
    if(window.XMLHttpRequest){
        xhr=new XMLHttpRequest();
    }else{
        xhr=new ActiveObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4&&xhr.status==200){
        	var result=xhr.responseText.replace(/^\s*|\s*$/g, '');
            if (result=="failed"){
                document.getElementById("regres").style.display="block"; 
            }else if(result=="success"){
                window.location.href="php/home.php"; 
            }
        }
            
    }
    xhr.open("POST","php/register.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send(para);
}