<?php
/**
 * Created by PhpStorm.
 * User: CoolCats
 * Date: 2019/3/23
 * File: Helper
 */

/**
 * 错误提示消息
 * @param $uname
 */
function error_tips($uname){
    echo json_encode(array(
        "username"=>$uname,
        "Status"=>false,
    ));
}

/**
 * 成功提示消息
 * @param $uname
 */
function success_tips($uname){
    echo json_encode(array(
        "username"=>$uname,
        "Status"=>200,
    ));
}

function repet_tips($uname){
    echo json_encode(array(
        "user"=>$uname,
        "Status"=>50,
    ));
}
function check_user($dbconn,$user){
    $user = strip_tags($user);
    $sql = "select count(1) from " . "todo_user" . " where " . '"user"' . '=$1';
    $result = pg_query_params($dbconn, $sql, array($user));
    if (!$result) {
        return false;
    } else {
        $row = (pg_fetch_row($result));
        if (intval($row[0]) == 0) {//没有查到记录
            return false;  //错误提示
        } else {//存在此用户，登录成功
            pg_freeresult($result);//释放资源
            return true;
        }
    }
}
/**
 * 对用户输入进行过滤，防止潜在的绕过以及注入
 * @param $input 用户输入
 */
function checkString($input){
    $input = htmlspecialchars($input);
    return $input;
}