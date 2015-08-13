<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 14/12/23
 * Time: 上午12:47
 */
define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__.'/dao/user_auth_fns.php');
require_once(__ROOT__.'/model/User.php');

$paramaters = array();
$paramaters = $_POST;

$password =$paramaters['password'];
$phone = $paramaters['phone'];
$nickname = $paramaters['nickname'];
$deviceToken = $paramaters['deviceToken'];
$birthday = $paramaters['birthday'];
$sex = $paramaters['sex'];

$user = new User();
$user->setPassword($password);
$user->setPhone($phone);
$user->setNickname($nickname);
$user->setSex($sex);
$user->setBirthday($birthday);
$user->setDeviceToken($deviceToken);
$user->setUId(uniqid("kp", true));
$user->setGoal("10000");

$uid = $user->getUId();

//判断用户名是否已经注册
//判断邮箱是否有效
//判断邮箱是否已经被注册
//判断密码是否有效
$isValid = valid_data($user);

$output = array();

$status = register($user);

if($status == 200) {
    //token 由uuid和用户邮箱MD5得到
    $token = md5($deviceToken+$phone+$uid);

    //输出数据
    $output = array(
        "msg" => "success",
        "phone"=>$phone,
        "nickname"=>$nickname,
        "token"=>$token,
        "u_id"=>$uid,
        "birthday"=>$birthday,
        "today_goal"=>$user->getGoal(),
        "sex"=>$sex
    );

    header('Content-type: application/json', false, "200");
    echo json_encode($output);
} else if ($status == 400) {
    $output = array(
        "msg" => "could not exexute query"
    );

    header('Content-type: application/json', false, "401");
    echo json_encode($output);
} else if ($status == 401) {
    $output = array(
        "msg" => "that username is taken,plase choose another one."
    );
    header('Content-type: application/json', false, "401");
    echo json_encode($output);
}  else if ($status == 403) {
    header('Content-type: application/json', false, "403");
    $output = array(
        "msg" => "phone is unvalid"
    );
    echo json_encode($output);
}



