<?php
/**
 * Created by PhpStorm.
 * User: CoolCats
 * Date: 2019/3/22
 * Time: 16:09
 */
if(isset($_REQUEST["username"])&&
    isset($_REQUEST["password"])&&
    isset($_REQUEST["realname"])&&
    isset($_REQUEST["email"])&&
    isset($_REQUEST["mobile"])){

    include('dbconn.php');
//$dbconn = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass);
//$dbstr = "host=127.0.0.1 port=5432 dbname=webgisdb user=postgres";
    $dbstr = "host=" . HOST . " port=" . PORT . " dbname=" . DB_NAME . " user=" . DB_USER;
    $dbconn = pg_connect($dbstr);
//$user = "res";
//$passwd = "111";
//$realname = "陈";
//$email="25@163.com";
//$mobile = "179335d4354";
    $user = $_REQUEST["username"];
    $passwd = $_REQUEST["password"];
    $realname = $_REQUEST["realname"];
    $email = $_REQUEST["email"];
    $mobile = $_REQUEST["mobile"];
    if (!$dbconn) {//数据库连接错误
        echo json_encode(array(
            "success" => false,
            "message" => "Error",
        ));
    } else {//数据库连接成功
        if($user==""){
            exit(1);
        }
        $sql = "insert into todo_user" . " " . '("user",passwd,realname,email,mobile) ' . " values($1,$2,$3,$4,$5)";
        $data = array(
            $user,
            $passwd,
            $realname,
            $email,
            $mobile
        );
        $result = pg_query_params($dbconn, $sql, $data);
        if (!$result) {
            echo json_encode(array(
                "success" => false,
                "message" => "Fail",//@pg_last_error()
            ));
        } else {
            echo json_encode(array(
                "success" => true,
                "message" => "Success"
            ));
        }
    }

}
