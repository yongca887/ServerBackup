<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/3/2
 * Time: 下午1:21
 */

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/dao/db_manager.php');
require_once(__ROOT__.'/model/Pedometer.php');

$paramaters = array();
$paramaters = $_POST;

/* 获取上传数据 */
$pedometers = $paramaters['pedometers'];

//$output = array();
$flag = 0;

$flag = syncData($pedometers);

//输出数据
if($flag == 200) {
    $output = array(
        "msg" => "success",
    );

    header('Content-type: application/json', false, $flag);
    echo json_encode($output);
} else {
    $output = array(
        "msg" => "failure",
    );

    header('Content-type: application/json', false, $flag);
    echo json_encode($output);
}