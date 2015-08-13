<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/3/14
 * Time: 下午5:33
 * 分为两方式：第一种是无参查询，即查询所有人的最大值，
 * 另外一种是带user_id的查询，当前的user_id的最大值
 */
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/dao/db_manager.php');
require_once(__ROOT__.'/model/Pedometer.php');

//connect to db
$conn = db_connect();

$paramaters = array();
$paramaters = $_POST;

$u_id = $paramaters['u_id'];

$result = null;
if ($u_id == null) {
    $result = $conn->query("select steps, calory from kr_pedometer");
} else {
    $result = $conn->query("select steps, calory from kr_pedometer where u_id = '".$u_id."' ");
}
//check if username is unique

if(!$result) {
    echo "could not exexute query";
}

if($result->num_rows > 0) {
    $maxSteps = 0;
    $maxCalorie = 0;
    while($row = $result->fetch_assoc()) {
         $steps = $row['steps'];
         $calorie = $row['calory'];
        if($steps > $maxSteps) {
            $maxSteps = $steps;
        }

        if($calorie > $maxCalorie) {
            $maxCalorie = $calorie;
        }
    }

    $output = array(
        "maxSteps" => $maxSteps,
        "maxCalory" => $maxCalorie
    );

    header('Content-type: application/json', false, "200");
    echo json_encode($output);
}