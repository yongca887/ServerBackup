<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 14/12/22
 * Time: 下午4:09
 */

define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__.'/db_manager/db_fns.php');
require_once(__ROOT__.'/dao/data_valid_fns.php');
require_once(__ROOT__.'/model/User.php');

/**
 * 验证用户数据是否有效
 * @param User $user
 */
function valid_data(User $user) {
    //TODO:
}

/**
 * 用户注册
 * @param User $user
 * @return int
 */
function register(User $user) {
    $phone = $user->getPhone();
    $password = $user->getPassword();
    $nickname = $user->getNickname();
    $sex = $user->getSex();
    $birthday = $user->getBirthday();
    $deviceToken = $user->getDeviceToken();
    $uid = $user->getUId();
    $goal = $user->getGoal();
    $token = md5($deviceToken+$phone+$uid);

    //connect to db
    $conn = db_connect();

    $result = $conn->query("select * from kr_user where phone ='".$phone."'");
    if(!$result) {
        return 400;
    }

    if($result->num_rows > 0) {
        return 401;
    }

    //if ok , put in db
    $result = $conn->query("insert into kr_user (u_id, phone, password, nickname, token, deviceToken, sex, birthday, goal) values ('".$uid."', '".$phone."', sha1('".$password."'), '".$nickname."', '".$token."', '".$deviceToken."', '".$sex."', '".$birthday."', '".$goal."')");
    if(!$result) {
        return 501;
    }

    return 200;
}

function login($phone, $password) {
    //connect to db
    $conn = db_connect();

    //check if username is unique
    $result = $conn->query("select * from kr_user where phone ='".$phone."' and password =sha1('".$password."')");
    if(!$result) {
        echo "could not exexute query";
    }

    $user = new User();
    if($result->num_rows > 0) {
        //将用户信息返回
        $row = $result->fetch_assoc();
        $user->setPhone($row['phone']);
        $user->setNickname($row['nickname']);
        $user->setSex($row['sex']);
        $user->setBirthday($row['birthday']);
        $user->setToken($row['token']);
        $user->setDeviceToken($row['deviceToken']);
        $user->setUId($row['u_id']);
        $user->setHeight($row['height']);
        $user->setWeight($row['weight']);
        $user->setGoal($row['goal']);

        return $user;
    } else {
        $user = null;
        return $user;
    }
}

function logout($u_id) {
    $conn = db_connect();
    $result = $conn->query("update kr_user set flag = '".false."' from u_id = '".$u_id."' ");

    if(!$result) {
        return 200;
    } else {
        return 301;
    }
}

function modify(User $user) {
    $u_id = $user->getUId();
    $birthday = $user->getBirthday();
    $sex = $user->getSex();
    $nickname = $user->getNickname();
    $user_weight = $user->getWeight();
    $user_height = $user->getHeight();
//    //TODO:头像
////    $avatar = $user->avatar;

    //connect to db
    $conn = db_connect();
    $result = $conn->query("update kr_user set weight = '".$user_weight."', height = '".$user_height."',
    birthday = '".$birthday."', sex = '".$sex."', nickname = '".$nickname."'
     where u_id = '".$u_id."'");

//    return 200;
    if (!$result) {
        return 301;
    }

    return 200;
}

function setGoal($u_id, $goal) {
    $conn = db_connect();

    $result = $conn->query("update kr_user set goal = '".$goal."' where u_id = '".$u_id."'");

    if (!$result) {
        return 301;
    }

    return 200;
}

function resetPassword($u_id, $pw) {
    $conn = db_connect();

    $result = $conn->query("update kr_user set password = '".$pw."' where u_id = '".$u_id."'");

    if (!$result) {
        return 301;
    }

    return 200;
}