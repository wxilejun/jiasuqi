<?php
    $lianJie = mysqli_connect("localhost", "root", "", "jiasuqi");
    // 提示数据库状态
    if ($lianJie) {
        // echo "数据库就绪";
    } else {
        echo "数据库错误";
    }
?>