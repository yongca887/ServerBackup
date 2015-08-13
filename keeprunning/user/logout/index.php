<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/3/16
 * Time: 上午11:10
 */

define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__.'/dao/user_auth_fns.php');

$paramaters = array();
$paramaters = $_POST;

$user_id = $paramaters['u_id'];

$code_status = logout($user_id);

if ($code_status) {
    $output = array(
        "msg" => "logoutted"
    );

    header('Content-type: application/json',false, "200");
    echo json_encode($output);
} else {

}