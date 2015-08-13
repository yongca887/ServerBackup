<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 15/3/1
 * Time: 下午11:45
 */
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/dao/db_fns.php');

function savePedometer($pedometer) {
    $steps = $pedometer->steps;
    $date = $pedometer->date;
    $u_id = $pedometer->user_id;
    $goal = $pedometer->goal;
    $calory = $pedometer->calory;

    //connect to db
    $conn = db_connect();

    //if ok , put in db
    $result = $conn->query("insert into kr_pedometer (u_id, steps, date, goal, calory) values ('".$u_id."', '".$steps."', '".$date."', '".$goal."', '".$calory."')");

    if(!$result) {
//        echo "Could not register you in database - please try again later.";
        return 501;
    } else {
        return 200;
    }
}

function updatePedometer($pedometer) {
    $steps = $pedometer->steps;
    $date = $pedometer->date;
    $u_id = $pedometer->user_id;
    $goal = $pedometer->goal;
    $calory = $pedometer->calory;

    //connect to db
    $conn = db_connect();

    //if ok , put in db
    $result = $conn->query("update kr_pedometer set steps = '".$steps."', goal = '".$goal."', calory = '".$calory."' where u_id = '".$u_id."' and date = '".$date."' ");

    if(!$result) {
//        echo "Could not register you in database - please try again later.";
        return 501;
    } else {
        return 200;
    }
}

function syncData($pedometers) {
    foreach($pedometers as $key => $value ) {
        $pedometer = new Pedometer();
        $pedometer->goal = $value['goal'];
        $pedometer->steps = $value['steps'];
        $pedometer->calory = $value['calory'];
        $pedometer->date = $value['date'];
        $pedometer->user_id = $value['u_id'];

        $date = $pedometer->date;
        $u_id = $pedometer->user_id;
        //connect to db
        $conn = db_connect();

        //if ok , put in db
        $result = $conn->query("select * from kr_pedometer where u_id = '".$u_id."' and date = '".$date."' ");
        if($result->num_rows > 0) {
            //如果是今天，则更新数据
            updatePedometer($pedometer);
        } else {
            $flag = savePedometer($pedometer);
        }
    }
}