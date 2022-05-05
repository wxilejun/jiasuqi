<?php
    // 不提示错误信息
    error_reporting(0);
    
    // 开启 SESSION
    session_start([
        "cookie_lifetime" => 86400
    ]);
    
    // 数据库
    include "./ShuJuKu.php";
    
    // 初始化
    if ($_SESSION["userName"] != null) {
        // 已经登录
        include "./index.php";
    } else {
        // 没有登录
        include "./DengLu.html";
    }
    
    // 保存表单数据
    $userName = $_POST["username"];
    $passWord = $_POST["password"];
        
    // 判断内容
    if ($userName != null) {
        if ($passWord != null) {
            // 账号是否存在
            $zhangHaoPanDuan = "SELECT * FROM `user` WHERE UserName = '$userName'";
            // 执行数据库指令
            $zhangHaoPanDuanQuery = mysqli_query($lianJie, $zhangHaoPanDuan);
            // 执行结果
            if ($zhangHaoPanDuanQuery) {
                // 结果数据
                $zhangHaoPanDuanQueryFetch = mysqli_fetch_array($zhangHaoPanDuanQuery);
                // 判断是否登录成功
                if ($userName == $zhangHaoPanDuanQueryFetch["UserName"]) {
                    if ($passWord == $zhangHaoPanDuanQueryFetch["PassWord"]) {
                        // 登录成功
                        // echo "<script>alert(\"登录成功\");</script>";
                        // 保存登录信息
                        $_SESSION["userName"] = $zhangHaoPanDuanQueryFetch["UserName"];
                        $_SESSION["passWord"] = $zhangHaoPanDuanQueryFetch["PassWord"];
                        
                        // 刷新页面
                        header("Location: ./YongHu.php");
                    } else {
                        // 密码错误
                        echo "<script>alert(\"密码错误\");</script>";
                    }
                } else {
                    // 账号错误
                    echo "<script>alert(\"账号错误\");</script>";
                    header("Location: ./DengLu.html");
                }
            }
        }
    }
?>