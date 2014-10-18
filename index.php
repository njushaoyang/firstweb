<html lang="zh" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>my zhi hu</title>
        <link rel="stylesheet" href="css/page.css" type="text/css">
        <script>
            function changeform() {
                if (document.getElementById("login").style.display === "none") {
                    document.getElementById("register").style.display = "none";
                    document.getElementById("login").style.display = "block";
                } else {
                    document.getElementById("login").style.display = "none";
                    document.getElementById("register").style.display = "block";
                }
            }
        </script>
        <script type="text/javascript" src="js/login.js"></script>
    </head>
    <body class="zhi">
        <div class="wrapper">
             <div class="top">
                <div class="inner-wrapper">
                    <div class="form-wrapper">
                        <div class="logo">
                        </div>
                        <div class="signin-form-wrapper" id="register">
                            <form class="signin-form" action="php/register.php" method="post" onsubmit="return false;">
                                <div class="form-header">
                                    <a class="signin-icon" href="#signin" onclick="changeform()">
                                        登录
                                        <i class="signin-arrow"></i>
                                    </a>
                                    <a class="signin-icon-return">
                                        注册账号
                                    </a>
                                </div>
                                <div class="nameinput-wrapper">
                                    <input class="name-input" type="text" name="name" id="name" placeholder="姓名" required />
                                </div>
                                <div class="emailinput-wrapper">
                                    <input class="email-input" type="email" name="email" id="email" placeholder="邮箱" required />
                                </div>
                                <div class="passwordinput-wrapper">
                                    <input class="password-input" type="password" name="password" id="password" placeholder="密码" required />
                                </div>
                                <div class="registerresult" style="display:none" id="regres">
                                    该用户已经注册
                                </div>

                                <div class="button-wrapper">
                                    <input class="button" type="submit" value="注册" name="regsubmit" onclick="register()"/>
                                </div>
                            </form>
                        </div>

                        <div class="signin-form-wrapper" style="display:none" id="login">
                            <form class="signin-form" action="php/login.php" method="post" onsubmit="return false;">
                                <div class="form-header">
                                    <a class="signin-icon" href="#signup" onclick="changeform()">
                                        注册
                                        <i class="signin-arrow"></i>
                                    </a>
                                    <a class="signin-icon-return">
                                        登录
                                    </a>
                                </div>
                                <div class="emailinput-wrapper">
                                    <input class="email-input" type="email" name="email" id="logemail" placeholder="邮箱" required />
                                </div>
                                <div class="passwordinput-wrapper">
                                    <input class="password-input" type="password" name="password" id="logpassword" placeholder="密码" required />
                                </div>
                                <div class="registerresult" style="display:none" id="logres">
                                    密码错误
                                </div>
                                <div class="button-wrapper">
                                    <input class="button" type="submit" value="登录" name="logsubmit" onclick="login()"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>