<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/3/5
 * Time: 下午5:05
 */
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/dao/user_auth_fns.php');
require_once(__ROOT__.'/model/User.php');

$paramaters = array();
$paramaters = $_POST;

$u_id = $paramaters['u_id'];
$nickname = $paramaters['nickname'];
$birthday = $paramaters['birthday'];
$sex = $paramaters['sex'];
$weight = $paramaters['weight'];
$height = $paramaters['height'];

$user = new User();
$user->setNickname($nickname);
$user->setSex($sex);
$user->setBirthday($birthday);
$user->setWeight($weight);
$user->setHeight($height);
$user->setUId($u_id);

//if (modify($user) == 200) {
//    $output = array(
//        "msg" => "success",
//        "u_id" => $u_id,
//        "nickname" => $nickname,
//        "birthday" => $birthday,
//        "sex" => $sex,
//        "weight" => $weight,
//        "height" => $height
//    );
//
//    header('Content-type: application/json', false, "200");
//    echo json_encode($output);
//}




//

$status = modify($user);
if ($status == 200) {
    $output = array(
        "msg" => "success",
        "nickname"=>$nickname,
        "u_id"=>$u_id,
        "birthday"=>$birthday,
        "weight"=>$weight,
        "height"=>$height,
        "sex"=>$sex
    );

    header('Content-type: application/json', false, "200");
    echo json_encode($output);
} else if ($status == 301) {
    $output = array(
        "msg" => "could not exexute query",
    );
    header('Content-type: application/json', false, "301");
    echo json_encode($output);
} else {
    $output = array(
        "msg" => "could not exexute query",
    );
    header('Content-type: application/json', false, "500");
    echo json_encode($output);
}