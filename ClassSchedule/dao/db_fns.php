<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 14/12/24
 * Time: 下午11:20
 */
function db_connect() {
    $result = new mysqli('localhost', 'root', 'b99d4c33bd', 'ClassSchedule');

    if(!$result) {
        throw new Exception('could not connect to database server');
    } else {
        return $result;
    }
}
