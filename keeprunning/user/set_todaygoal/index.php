<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/3/27
 * Time: 上午11:35
 */
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/dao/user_auth_fns.php');
require_once(__ROOT__.'/model/User.php');

$paramaters = array();
$paramaters = $_POST;

$u_id = $paramaters['u_id'];
$today_goal = $paramaters['today_goal'];

$status = setGoal($u_id, $today_goal);
if ($status == 200) {
    $output = array(
        "msg" => "success"
    );

    header('Content-type: application/json', false, "200");
    echo json_encode($output);
} else if ($status == 301) {
    $output = array(
        "msg" => "could not exexute query",
    );
    header('Content-type: application/json', false, "301");
    echo json_encode($output);
}