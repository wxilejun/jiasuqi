<?php
    // 不提示错误信息
    error_reporting(0);
    
    // 加速地址
    $jiaSuDiZhiString = file_get_contents("DiZhi/index.json");
    // 解析结果
    $jiaSuDiZhiJson = json_decode($jiaSuDiZhiString);

    // 验证账号
    if ($_SESSION['userName'] == null) {
        header("Location: ./denglu.html");
    }
    
?>

<!Doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
<title>Super - 用户</title>
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
    
    .xinXi {
        // height: 200px;
        width: 80%;
        margin: 10px auto 10px auto;
        box-shadow: 0 2px 2px #dddddd;
        border: 1px solid #dddddd;
        border-radius: 10px;
        padding: 10px 20px 10px 20px;
    }
    
    .xinXi span {
        overflow: auto;
        display: block;
        white-space: nowrap;
    }
</style>
</head>

<body>
    <header>
        <div class="right">
            <from action="./" method="POST">
                <a href="" type="submit" name="tuiChuZhangHao"><svg t="1647606826366" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2235" width="200" height="200"><path d="M874.666667 855.744a19.093333 19.093333 0 0 1-19.136 18.922667H168.469333A19.2 19.2 0 0 1 149.333333 855.530667V168.469333A19.2 19.2 0 0 1 168.469333 149.333333h687.061334c10.581333 0 19.136 8.533333 19.136 18.922667V320h42.666666V168.256A61.717333 61.717333 0 0 0 855.530667 106.666667H168.469333A61.866667 61.866667 0 0 0 106.666667 168.469333v687.061334A61.866667 61.866667 0 0 0 168.469333 917.333333h687.061334A61.76 61.76 0 0 0 917.333333 855.744V704h-42.666666v151.744zM851.84 533.333333l-131.797333 131.754667a21.141333 21.141333 0 0 0 0.213333 29.973333 21.141333 21.141333 0 0 0 29.973333 0.192l165.589334-165.589333a20.821333 20.821333 0 0 0 6.122666-14.976 21.44 21.44 0 0 0-6.314666-14.997333l-168.533334-168.533334a21.141333 21.141333 0 0 0-29.952-0.213333 21.141333 21.141333 0 0 0 0.213334 29.973333L847.296 490.666667H469.333333v42.666666h382.506667z" fill="#ffffff" p-id="2236"></path></svg></a>
            </from>
            <?php
                if (isset($_POST['tuiChuZhangHao'])) {
                    unset($_SESSION["userName"]);
                    unset($_SESSION["passWord"]);
                    echo "点击了按钮";
                }
            ?>
        </div>
        <div class="left">
            <span>Super</span>
        </div>
    </header>
    
    <div class="gongNeng">
        <span style="margin: 0 0 10px 0; display: inline-block;">有问题请联系邮箱 xlj@xlj0.com</br> 程序由 <a href="https://xlj0.com">XLJ</a> 开发</span>
    </div>
    
    <div class="xinXi">
        <span>账号: <?php echo $_SESSION["userName"]; ?></span>
        <span>账号状态: 正常</span>
        <span>账号会员: 免费会员</span>
        <br>
        <span>加速地址: <?php echo $jiaSuDiZhiJson->jiaSuDiZhi; ?></span>
        <span>(加速地址不定期自动更新)</span>
        <span>(暂无订阅地址)</span>
        <span>(禁止违法，禁止违法，禁止违法，仅供学习和查资料使用，如有违法会把IP报给公安机关处理)</span>
        <span>(请添加交流群 QQ群: 824789019)</span>
    </div>
</body>
</html>