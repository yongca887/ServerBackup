<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/6/5
 * Time: 上午10:34
 */
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/dao/db_manager.php');
require_once(__ROOT__.'/feedback/FeedBack.php');

$paramaters = array();
$paramaters = $_POST;

$feedback = new FeedBack();
$feedback->email = $paramaters['email'];
$feedback->msg = $paramaters['msg'];

$flag = saveFeedBack($feedback);
if ($flag == 200) {
    $output = array(
        "msg" => "success",
    );

    header('Content-type: application/json', false, $flag);
    echo json_encode($output);
} else {
    $output = array(
        "email"=> $feedback->email,
        "msg" => $feedback->msg,
    );

    header('Content-type: application/json', false, $flag);
    echo json_encode($output);
}