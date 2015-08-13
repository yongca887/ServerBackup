<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/3/1
 * Time: 下午6:30
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

foreach($pedometers as $key => $value ) {
    $pedometer = new Pedometer();
    $pedometer->goal = $value['goal'];
    $pedometer->steps = $value['steps'];
    $pedometer->calory = $value['calory'];
    $pedometer->date = $value['date'];
    $pedometer->user_id = $value['userid'];

    $flag = savePedometer($pedometer);
}

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


//$output = $pedometers;

