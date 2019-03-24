<?php
/**
 * Created by PhpStorm.
 * User: CoolCats
 * Date: 2019/3/20
 * File: login.php
 */
session_start();
if (isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
    $user = $_REQUEST["username"];
    $passwd = $_REQUEST["password"];

//$user= "";
//$passwd = "";
// 连接postgres数据库
    include('helper.php');
    $dbstr = "host=127.0.0.1 port=5432 dbname=webgisdb user=postgres";
    $dbconn = pg_connect($dbstr);
    if (!$dbconn) {
        die("请稍后再试");
    }

// 构造一个SQL查询语句
    $sql = "select count(1) from " . "todo_user" . " where " . '"user"' . '=$1 and passwd=$2';
    $result = pg_query_params($dbconn, $sql, array($user, $passwd));
    if (!$result) {
        error_tips($user);  //错误提示
        exit(1);
    } else {
        $row = (pg_fetch_row($result));
        if (intval($row[0]) == 0) {//没有查到记录
            error_tips($user);  //错误提示
        } else {//存在此用户，登录成功
            success_tips($user);//
            $_SESSION['user'] = $user;
        }
        pg_freeresult($result);//释放资源
        pg_close($dbconn);      //关闭连接
    }


}
