<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/3/1
 * Time: 下午6:31
 */

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/dao/db_fns.php');

/**
 * 从数据库获取历史记步数据
 */
$paramaters = array();
$paramaters = $_POST;

$u_id = $paramaters['u_id'];

$output = array();

//connect to db
$conn = db_connect();


//check if username is unique
$result = $conn->query("select * from kr_pedometer where u_id = '".$u_id."' ");

if(!$result) {
    echo "could not exexute query";
}

if($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $output[] = $row;
    }

    header('Content-type: application/json', false, "200");
    echo json_encode($output);
} else {

    //输出数据
    $output = array();

    header('Content-type: application/json', false, "401");
    echo json_encode($output);
}

