<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 14-8-23
 * Time: 上午11:21
 */

////获取完整的url
//$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//$output = array(
//    "msg" => $url
//);
//
//header('Content-type: application/json');
//echo json_encode($output);



$paramaters = array();
$paramaters = $_POST;
$name = $paramaters['nickname'];
$password =$paramaters['password'];
$email = $paramaters['email'];

$output = array();

$paramaters = file_get_contents("php://input");
//输出数据
//$output = array(
//
//	"name" => $name,
//	"password" => $password,
//    	"email" => $email
//);

header('Content-type: application/json');
echo json_encode($paramaters);