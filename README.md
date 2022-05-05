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


  [1]: https://xlj0.com/usr/uploads/2022/05/2734992234.sql
