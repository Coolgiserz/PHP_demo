<?php
/**
 * Created by PhpStorm.
 * User: CoolCats
 * Date: 2019/3/23
 * File: Helper
 */
function error_tips($uname){
    echo json_encode(array(
        "username"=>$uname,
        "Status"=>false,
    ));
}

function success_tips($uname){
    echo json_encode(array(
        "username"=>$uname,
        "Status"=>200,
    ));
}
