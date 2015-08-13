<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 14/12/23
 * Time: 上午12:47
 */
define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__.'/dao/user_auth_fns.php');

$paramaters = array();
$paramaters = $_POST;
$phone = $paramaters['phone'];
$password =$paramaters['password'];

$output = array();

$user = login($phone, $password);
if($user != null) {
    //输出数据
    $output = array(
        "u_id" => $user->getUId(),
        "deviceToken"=> $user->getDeviceToken(),
        "token"=> $user->getToken(),
        "phone" => $user->getPhone(),
        "sex" => $user->getSex(),
        "birthday" => $user->getBirthday(),
        "nickname" => $user->getNickname(),
        "height" => $user->getHeight(),
        "weight" => $user->getWeight(),
        "today_goal" => $user->getGoal()
    );

    header('Content-type: application/json',false, "200");
    echo json_encode($output);
} else {
    //输出数据
    $output = array(
        "stauscode" => "401",
        "result" => "could not log you in",
    );

    header('Content-type: application/json',false, "401");
    echo json_encode($output);
}