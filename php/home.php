<?php
session_start();
?>
<html lang="zh_CN" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>首页-乎乎</title>
        <link rel="stylesheet" href="../css/home.css" type="text/css"  />
        <script type="text/javascript">
            function askQuestion() {
                document.getElementById("opacitytop").style.display = "block";
                document.getElementById("askwrapper").style.display = "block";
            }
        </script>
        <script type="text/javascript" src="../js/home.js"></script>
    </head>
    <body class="home">
        <?php
        $_SESSION["name"]="pangzi";
        $name=$_SESSION["name"];
        echo "<input type='text' id='username' value='$name' style='display:none'/>";
        ?>
        <div class="wrapper">
            <div class="head-wrapper">
                <div class="head-content">
                    <a class="head-logo"></a>
                    <div class="search-wrapper">
                        <form class="search-form"action="">
                            <input class="search-text"type="text" id="search" name="search" />
                        </form>
                        <input class="search-button" type="button" id="searchbutton" name="searchbutton" value="搜索"/>
                    </div>
                    <div id="nav">
                        <ul>
                            <li>
                                <div>
                                    <a >
                                        <?php
                                        echo "welcome";
                                        ?>
                                    </a>
                                </div>
                                <ul>
                                    <li ><a class="menu" href="#">个人管理</a></li>
                                    <li ><a class="menu" href="#">退出</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>
            <div class="body-wrapper">
                <div class="main-wrapper">
                    <div class="content">
                        <div class="content-header">
                            热点问题
                        </div>
                        <div class="content-body">
                        </div>
                    </div>
                    <div class="optional-wrapper">
                        <ul class="optional-list">
                            <li class="optional-item">
                                <a class="optional-link" href="#" id="ask" onclick="askQuestion()">提问</a>
                            </li>
                            <li class="optional-item">
                                <a class="optional-link" href="#">我的收藏</a>
                            </li>
                            <li class="optional-item">
                                <a class="optional-link" href="#">所有问题</a>
                            </li>
                            <li class="optional-item">
                                <a class="optional-link" href="#">我的回答</a>
                            </li>
                            <li class="optional-item">
                                <a class="optional-link" href="#">我的提问</a>
                            </li>
                            <li class="optional-item">
                                <a class="optional-link" href="#">搜索用户</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="top" id="opacitytop" style="display:none">
        </div>
        <div class="ask-wrapper" id="askwrapper" style="display:none">
            <div class="ask-head" id="closeask">
                <div class="ask-word">提问</div>
                <div class="ask-close" onclick="closeask();"></div>
            </div>
            <div class="ask-body">
                <div class="topic-wrapper">
                    <input type="text" class="topic-input" id="topic-input" name="topic-input" placeholder="问题标题"/>
                </div>
                <div class="question-wrapper">
                    <div class="question-bar">
                        <input class="img-button"type="button" id="img-button" value="图片" onclick="onloadimg();"/>
                    </div>
                    <div class="question-input">
                        <div class="question" id="question" contenteditable="true">
                        </div>
                    </div>
                    <div class="tag-wrapper">
                        <ul class="tag-list">
                            <li>
                                <div class="tag" id="java" onclick="changecolor(this, 'javabox');">java</div>
                                <input type="checkbox" id="javabox"  name="check-box" value="java" style="display: none"/>
                            </li>
                            <li>
                                <div class="tag" id="ccpp" onclick="changecolor(this,'ccppbox');">c/cpp</div>
                                <input type="checkbox" id="ccppbox"  name="check-box" value="c/cpp" style="display: none"/>
                            </li>
                            <li>
                                <div class="tag" id="php" onclick="changecolor(this,'phpbox');">php</div>
                                <input type="checkbox" id="phpbox"  name="check-box" value="php" style="display: none"/>
                            </li>
                            <li>
                                <div class="tag" id="html" onclick="changecolor(this,'htmlbox');">html</div>
                                <input type="checkbox" id="htmlbox"  name="check-box" value="html" style="display: none"/>
                            </li>
                            <li>
                                <div class="tag" id="mysql" onclick="changecolor(this,'mysqlbox');">mysql</div>
                                <input type="checkbox" id="mysqlbox"  name="check-box" value="mysql" style="display: none"/>
                            </li>
                            <li>
                                <div class="tag" id="android" onclick="changecolor(this,'androidbox');">android</div>
                                <input type="checkbox" id="androidbox"  name="check-box" value="android" style="display: none"/>
                            </li>
                            <li>
                                <div class="tag" id="python" onclick="changecolor(this,'pythonbox');">python</div>
                                <input type="checkbox" id="pythonbox"  name="check-box" value="python" style="display: none"/>
                            </li>
                            <li>
                                <div class="tag" id="other" onclick="changecolor(this,'otherbox');">other</div>
                                <input type="checkbox" id="otherbox"  name="check-box" value="other" style="display: none"/>
                            </li>
                        </ul>
                    </div>
                    <div class="score-wrapper">
                        <div class="score-text">悬赏分数</div>
                        <input class="score-input" type="text" id="score" /> 
                    </div>
                    <div class="bottombutton-wrapper">
                        <input class="reset-button" type="button" value="取消" onclick="resetInput();"/>
                        <input class="submit-button" type="button" value="提交" onclick="submitInput();"/>
                    </div>
                    <div class="img-wrapper" id="imgwrapper" style="display:none">
                        <div class="img-wrapper-head">
                            上传图片
                            <div class="close-img-head" onclick="closeimg();"></div>
                        </div>
                        <form class="img-form" action="../php/unloadimg.php" method="post" 
                              enctype="multipart/form-data" target="form-target" onsubmit="startUpload();">
                            <input type="file" class="img-unload" name="myfile"/>
                            <input type="submit" class="img-submit" value="上传图片" />
                        </form>
                        <iframe style="width:0; height:0; border:0;" name="form-target"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>