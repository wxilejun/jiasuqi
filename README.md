### 简述
之前写了一个加速器项目，由PHP计算机语言编写，开源

### 代码
首先是数据库
打开 `phpmyadmin` 数据库控制面板，然后创建一个新的数据库，找到 `SQL` 这个选项，然后把代码复制粘贴，执行
```
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `UserName` text NOT NULL,
  `PassWord` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
```

另一种方式 文件导入
[shujuku.sql][1]

编辑数据库文件，位于 ./GongNeng/ShuJuKu.php
localhost 是数据库地址
root 是数据库用户名
"" 填写数据库用户名密码
jiasuqi 是选择的数据库
```
<?php
    $lianJie = mysqli_connect("localhost", "root", "", "jiasuqi");
    // 提示数据库状态
    if ($lianJie) {
        // echo "数据库就绪";
    } else {
        echo "数据库错误";
    }
?>
```

效果图
首页
![01][2]

注册
![02][3]

登录
![03][4]

数据
![04][5]

  [1]: https://xlj0.com/usr/uploads/2022/05/2734992234.sql
  
  [2]: https://pic.rmb.bdstatic.com/bjh/959eeac957fd6784fd0aa6d544d2549c.png
  [3]: https://pic.rmb.bdstatic.com/bjh/f27b5409b25701fffa81bd64be11d346.png
  [4]: https://pic.rmb.bdstatic.com/bjh/44ff8a7ec91b7bcc836845d593748aab.png
  [5]: https://pic.rmb.bdstatic.com/bjh/1bd7b85cf0dad268a9ba2ef01dbb41d9.png
  [6]: https://github.com/wxilejun/jiasuqi/archive/refs/heads/main.zip
  [7]: https://github.com/wxilejun/jiasuqi
  [8]: https://gitee.com/wxilejun/jiasuqi
