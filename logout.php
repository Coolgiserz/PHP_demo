<?php
/**
 * Created by PhpStorm.
 * User: CoolCats
 * Date: 2019/3/23
 * File: logout.php
 */
session_start();
if (isset($_SESSION['user'])) {
    $old_user = $_SESSION['user'];
    unset($_SESSION['user']);
}

session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>登出</title>
</head>
<body>
<h1>登出页</h1>
<?php
if (!empty($old_user)) {
    echo '<p>你已经退出登录</p>';
} else {
    echo '<p>你还没有登录</p>';

}
?>
<p><a href="login.html">登录</a></p>
</body>

</html>
