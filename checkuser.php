<?php
/**
 * Created by PhpStorm.
 * User: CoolCats
 * Date: 2019/3/22
 * File: checkuser.php
 */
if(isset($_REQUEST['username'])){


    $user = $_REQUEST["username"];
    $dbstr = "host=127.0.0.1 port=5432 dbname=webgisdb user=postgres";
    $dbconn = pg_connect($dbstr);
    if (!$dbconn) {
        die("请稍后再试");
    }

// 构造一个SQL查询语句检查用户名是否存在
//select * from "todo_user" where "user"='zhuge';
    $sql = 'select count(1) from todo_user where "user"=$1';
//$sql = 'select count(1) from '.'"todo_user"' .'where'. '"user"=$1';
//$sql = "select count(1) from todo_user where 'user'=$1";
    $result = pg_query_params($dbconn, $sql, array($user));
    if (!$result) {
        exit(1);
    } else {

//    ()
        $row = pg_fetch_all($result);
        $row = $row[0]["count"];
//    var_dump($row[0]["count"]);
//    $row = intval(pg_num_rows($result));
        if ($row == 0) {//没有查到记录
            echo false;
        } else {//存在此用户，提示用户换一个账号名
            echo true;
        }

        pg_close($dbconn);
    }


}
