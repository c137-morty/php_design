﻿<?php
$username = '';
$password = '';
if (isset($_COOKIE['username']) and isset($_COOKIE['password'])) {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录/注册</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css"/>
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            //打开会员登录
            $("#Login_start_").click(function () {
                $("#regist_container").hide();
                $("#_close").show();
                $("#_start").animate({
                    left: '350px',
                    height: '520px',
                    width: '400px'
                }, 500, function () {
                    $("#login_container").show(500);
                    $("#_close").animate({
                        height: '40px',
                        width: '40px'
                    }, 500);
                });
            });
            //打开会员注册
            $("#Regist_start_").click(function () {
                $("#login_container").hide();
                $("#_close").show();
                $("#_start").animate({
                    left: '350px',
                    height: '520px',
                    width: '400px'
                }, 500, function () {
                    $("#regist_container").show(500);
                    $("#_close").animate({
                        height: '40px',
                        width: '40px'
                    }, 500);
                });
            });
            //关闭
            $("#_close").click(function () {

                $("#_close").animate({
                    height: '0px',
                    width: '0px'
                }, 500, function () {
                    $("#_close").hide(500);
                    $("#login_container").hide(500);
                    $("#regist_container").hide(500);
                    $("#_start").animate({
                        left: '0px',
                        height: '0px',
                        width: '0px'
                    }, 500);
                });
            });
            //去 注册
            $("#toRegist").click(function () {
                $("#login_container").hide(500);
                $("#regist_container").show(500);
            });
            //去 登录
            $("#toLogin").click(function () {
                $("#regist_container").hide(500);
                $("#login_container").show(500);
            });
        });
    </script>

</head>
<body style="background-image: url('images/dgut.jpeg'); background-repeat:no-repeat; background-size:cover;background-attachment:fixed;}
">

<center>
    <a id="Login_start_" class="btn btn-danger" style="width:100px;height:40px;border-radius: 0;">登录</a>
    <a id="Regist_start_" class="btn btn-success" style="width:100px;height:40px;border-radius: 0;">注册</a>
</center>

<!-- 会员登录  -->
<!--<div id='Login_start' style="position: absolute;" >-->
<div id='_start'>
    <div id='_close' style="display: none;">
        <span class="glyphicon glyphicon-remove"></span>
    </div>
    <br/>
    <!--登录框-->
    <div id="login_container">

        <div id="lab1">
            <span id="lab_login">登录</span>
            <span id="lab_toRegist">
				&emsp;还没有账号&nbsp;
				<span id='toRegist' style="color: #EB9316;cursor: pointer;">立即注册</span>
			</span>
        </div>
        <div style="width:330px;">
            <span id="lab_type1">手机号/账号登录</span>
        </div>
        <div id="form_container1">
                <br/>
                <input type="text" class="form-control" placeholder="手机号/用户名" id="login_number"
                       value="<?php echo $username ?>" name="username" required="required"/>
                <input type="password" class="form-control" placeholder="密码" id="login_password"
                       value="<?php echo $password ?>" name="password" required="required"/>
                <label class="radio-inline">
                    <input type="radio" name="login_type" value="user" checked="checked">用户
                </label>
                <label class="radio-inline">
                    <input type="radio" name="login_type" value="admin">管理员
                </label>
                <input type="button" name="login_submit" value="登录" class="btn btn-success" id="login_btn"
                 onclick="login()"/>
                <span id="rememberOrfindPwd">
				<span>
					<input name="remember_password" type="checkbox" style="margin-bottom: -1.5px;">
				</span>
			<span style="color:#000000">
					记住密码&emsp;&emsp;&emsp;&emsp;
				</span>
			<span style="color:#000000">
					忘记密码
				</span>
			</span>
                <input type="hidden" id="dst" name="dst" value="user/user_index.php">
        </div>

    </div>
    <!-- 会员注册 -->
    <div id='regist_container' style="display: none;">
        <div id="lab1">
            <span id="lab_login">用户注册</span>
            <span id="lab_toLogin">
				&emsp;已有账号&nbsp;
				<span id='toLogin' style="color: #EB9316;cursor: pointer;">立即登录</span>
			</span>
        </div>
        <div id="form_container2" style="padding-top: 25px;">

            <input type="text" class="form-control" value="admin" placeholder="用户名" id="regist_account">
            <input type="password" class="form-control" placeholder="密码" id="regist_password1"/>
            <input type="password" class="form-control" placeholder="确认密码" id="regist_password2"/>
            <input type="text" class="form-control" placeholder="邮箱" id="regist_email"/>
            <input type="text" class="form-control" placeholder="手机号" id="regist_phone"/>
        </div>
        <input type="button" value="注册" class="btn btn-success" id="regist_btn"/>
    </div>
</div>

<script type="text/javascript">
    var clock = '';
    var nums = 30;
    var btn;

    function sendCode(thisBtn) {
        btn = thisBtn;
        btn.disabled = true; //将按钮置为不可点击
        btn.value = '重新获取（' + nums + '）';
        clock = setInterval(doLoop, 1000); //一秒执行一次
    }

    function doLoop() {
        nums--;
        if (nums > 0) {
            btn.value = '重新获取（' + nums + '）';
        } else {
            clearInterval(clock); //清除js定时器
            btn.disabled = false;
            btn.value = '点击发送验证码';
            nums = 10; //重置时间
        }
    }

    $(document).ready(function () {
        $("#login_QQ").click(function () {
            alert("暂停使用！");
        });
        $("#login_WB").click(function () {
            alert("暂停使用！");
        });
    });


    function login() {
        var xmlhttp;
        var username = document.getElementById("login_number").value;
        var password = document.getElementById("login_password").value;
        var dst = document.getElementById("dst").value;
        var remember_password = document.getElementsByName("remember_password")[0];
        if(username.length == 0 || password.length == 0) {
            return;
        }
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                if (xmlhttp.responseText=="1") {
                    window.location.href="../"+dst;
                } else {
                    alert("用户名或密码输入有误，请重新输入！");
                    $('#login_number').addClass('alert alert-danger');
                    $('#login_password').addClass('alert alert-danger');
                }
            }
        };
        xmlhttp.open("POST","../../controllers/adminController.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("username="+username+"&password="+password+"&dst="+dst+"&login_submit=1&remember_password="+remember_password.checked);
    }
</script>
</body>
</html>
