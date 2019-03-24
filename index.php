<?php
/**
 * Created by PhpStorm.
 * User: CoolCats
 * Date: 2019/3/22
 * File: index.php
 */
session_start();//启动一个会话
?>
<html>
<head>
    <title>我的主页</title>

</head>
<body>
<h1>欢迎!</h1>
<?php
//检查会话变量
if(isset($_SESSION['user'])){//检查$_SESSION变量是否设置，及当前会话是否包含一个已注册用户
    echo '<p>你好, '.$_SESSION['user'].'</p>';
    echo '<p><a href="logout.php">退出登录</a></p>';

} else{//用户未登录，提示其登录
    echo '<p>请先登录！</p>';
    echo '<p><a href="login.html">登录</a></p>';


}

?>
</body>
</html>
