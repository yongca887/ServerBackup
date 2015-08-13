<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/3/18
 * Time: 下午1:24
 */

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/dao/user_auth_fns.php');
require_once(__ROOT__.'/model/User.php');

$paramaters = array();
$paramaters = $_POST;

$u_id = $paramaters['u_id'];
$new_pw = $paramaters['password'];
$vcode = $paramaters['vcode'];

if($vcode == "123456") {
    $result = resetPassword($u_id, $new_pw);

    if($result == 200) {
        $output = array("msg" => "success");

        header('Content-type: application/json', false, "200");
        echo json_encode($output);
    } else {
        $output = array("msg" => "error");

        header('Content-type: application/json', false, "301");
        echo json_encode($output);
    }
} else {
    $output = array("msg" => "vcode error");

    header('Content-type: application/json', false, "301");
    echo json_encode($output);
}
