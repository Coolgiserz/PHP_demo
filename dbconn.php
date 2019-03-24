<?php
/**
 * Created by PhpStorm.
 * User: CoolCats
 * Date: 2019/3/22
 * Time: 14:48
 */

//$dbstr = "host=127.0.0.1 port=5432 dbname=webgisdb user=postgres";
define('HOST','127.0.0.1');
define('PORT','5432');
define('DB_NAME','webgisdb');
define('DB_USER','postgres');
define('DB_PASSWD','');
//$dbconn = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass);

$dbname = "webgisdb";
$dbuser = "postgres";
$dbpass = "";
$host = "127.0.0.1";

//if(!$dbconn){//数据库连接错误
//    echo "Error";
//} else{//数据库连接成功
//    echo "Good";
//}

function insertData($tbname,$data){

}