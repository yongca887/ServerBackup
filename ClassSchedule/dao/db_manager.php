<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/3/1
 * Time: 下午11:45
 */
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/dao/db_fns.php');

function saveFeedBack($feedback) {
    $email = $feedback->email;
    $content = $feedback->msg;

    //connect to db
    $conn = db_connect();
    $conn->query("set charset utf8");

    //if ok , put in db
    $result = $conn->query("insert into cs_feedback (email, msg) values ('".$email."', '".$content."')");

    if(!$result) {
//        echo "Could not register you in database - please try again later.";
        return 501;
    } else {
        return 200;
    }
}

