<?php
    // 不提示错误信息
    error_reporting(0);
    
    // 数据库
    include "ShuJuKu.php";
    
    // 表单数据
    $userName = $_POST["username"];
    $passWord = $_POST["password"];
    $yanZhengMa = $_POST["yanzhengma"];
    
    // 表单有数据
    if ($userName != null) {
        if ($passWord != null) {
            if ($yanZhengMa == $_COOKIE["yanZhengMa"]) {
                // 防止重复账号
                $chaXunChongFu = "SELECT * FROM `user` WHERE UserName = '$userName'";
                // 执行数据库指令
                $chaXunChongFuQuery = mysqli_query($lianJie, $chaXunChongFu);
                // 提交状态
                if ($chaXunChongFuQuery) {
                    // 保存数据行数
                    $chaXunChongFuQueryNum = mysqli_num_rows($chaXunChongFuQuery);
                    // 判断是否重复
                    if ($chaXunChongFuQueryNum == 0) {
                        // 数据库命令
                        $sql = "INSERT INTO `user` (`ID`, `UserName`, `PassWord`, `Info`) VALUES (NULL, '$userName', '$passWord', '');";
                        // 执行数据库指令
                        $tianJiaZhangHao = mysqli_query($lianJie, $sql);
                        // 判断提交状态
                        if ($tianJiaZhangHao) {
                            echo "<script>alert(\"注册成功\");</script>";
                        }
                    } else {
                        echo "<script>alert(\"账号已被注册，换一个试试吧\");</script>";
                    }
                }
            } else {
                // 验证码错误
                echo "<script>alert(\"验证码错误\");</script>";
            }
        }
    }
?>

<!Doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
<title>Super - 注册账号</title>
<style>
    * {
        margin: 0;
        padding: 0;
    }
    
    html,body {
        height: 100%;
    }
    
    header {
        background-color: #2abafb;
        height: 60px;
        box-shadow: 0px 2px 2px #2abafb;
        color: #ffffff;
        font-size: 20px;
        position: relative;
    }
    
    .right {
        height: 60px;
        // background-color: #ff0000;
        width: 50%;
        position: absolute;
        right: 0;
        text-align: right;
        padding: 0 5% 0 0;
    }
    .right svg {
        width: 25px;
        height: 25px;
    }
    .right a {
        height: 60px;
        display: flex;
        justify-content: right;
        align-items: center;
        display: none;
    }
    
    .left {
        height: 60px;
        // background-color: #000000;
        width: 50%;
        padding: 0 0 0 5%;
    }
    .left span {
        line-height: 60px;
    }
    
    a {
        -webkit-tap-highlight-color: transparent;
        text-decoration: none;
        color: #000000;
    }
    
    .gongNeng {
        padding: 10px 5% 0 5%;
    }
    
    div.inputDiv {
        width: 80%;
        margin: 0 auto;
        position: relative;
        padding: 20px 0 0 0;
    }

    div.inputDiv input {
        border: none;
        background-color: transparent;
        border-bottom: 2px solid #dddddd;
        -webkit-tap-highlight-color: transparent;
        padding: 10px;
        outline: none;
        width: 100%;
    } div.inputDiv input:focus ~ span.inputText, div.inputDiv input:valid ~ span.inputText {
        top: 0;
        transition: all 100ms linear;
        color: #4444ff;
    } div.inputDiv input:focus, div.inputDiv input:valid {
        border-bottom: 2px solid #4444ff;
    }

    div.inputDiv span.inputText {
        position: absolute;
        font-weight: 200;
        top: 20px;
        left: 10px;
        transition: all 100ms linear;
    }

    div.inputDiv input.inputSubmit {
        width: 100%;
        display: inline-block;
        margin-top: 10px;
        padding: 10px 10px;
        font-weight: 200;
        /* background-color: #5050ff; */
        color: #000000;
        text-align: center;
        cursor: pointer;
        /* position: absolute; */
        /* right: 0; */
        -webkit-tap-highlight-color: transparent;
        border-bottom: none;
        font-size: 18px;
    }
</style>
</head>

<body>
    <header>
        <div class="right">
            <a href=""><svg t="1647262964776" class="icon" viewBox="0 0 1029 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1244" width="200" height="200"><path d="M1001.423238 494.592q21.504 20.48 22.528 45.056t-16.384 40.96q-19.456 17.408-45.056 16.384t-40.96-14.336q-5.12-4.096-31.232-28.672t-62.464-58.88-77.824-73.728-78.336-74.24-63.488-60.416-33.792-31.744q-32.768-29.696-64.512-28.672t-62.464 28.672q-10.24 9.216-38.4 35.328t-65.024 60.928-77.824 72.704-75.776 70.656-59.904 55.808-30.208 27.136q-15.36 12.288-40.96 13.312t-44.032-15.36q-20.48-18.432-19.456-44.544t17.408-41.472q6.144-6.144 37.888-35.84t75.776-70.656 94.72-88.064 94.208-88.064 74.752-70.144 36.352-34.304q38.912-37.888 83.968-38.4t76.8 30.208q6.144 5.12 25.6 24.064t47.616 46.08 62.976 60.928 70.656 68.096 70.144 68.096 62.976 60.928 48.128 46.592zM447.439238 346.112q25.6-23.552 61.44-25.088t64.512 25.088q3.072 3.072 18.432 17.408l38.912 35.84q22.528 21.504 50.688 48.128t57.856 53.248q68.608 63.488 153.6 142.336l0 194.56q0 22.528-16.896 39.936t-45.568 18.432l-193.536 0 0-158.72q0-33.792-31.744-33.792l-195.584 0q-17.408 0-24.064 10.24t-6.656 23.552q0 6.144-0.512 31.232t-0.512 53.76l0 73.728-187.392 0q-29.696 0-47.104-13.312t-17.408-37.888l0-203.776q83.968-76.8 152.576-139.264 28.672-26.624 57.344-52.736t52.224-47.616 39.424-36.352 19.968-18.944z" p-id="1245" fill="#ffffff"></path></svg></a>
        </div>
        <div class="left">
            <span>注册</span>
        </div>
    </header>
    
    <div class="gongNeng">
        <span style="margin: 0 0 10px 0; display: inline-block;">请勿注册多个账户，忘记密码可以联系邮箱 xlj@xlj0.com </br> 程序由 <a href="https://xlj0.com">XLJ</a> 开发</span>
        <form action="" method="POST">
            <div class="inputDiv">
                <input type="text" name="username" required>
                <span class="inputText">账号</span>
            </div>
            <div class="inputDiv">
                <input type="password" name="password" required>
                <span class="inputText">密码</span>
            </div>
            <div class="inputDiv">
                <input type="text" name="yanzhengma" required>
                <span class="inputText">验证码</span>
                <img src="./YanZhengMa.php" style="margin: 10px 0;"></img>
                <input type="submit" value="注册" name=zhuce" class="inputSubmit">
                <a href="./DengLu.html" style="width: 100%; display: block; text-align: right;">登录</a>
            </div>
        </form>
    </div>
</body>
</html>