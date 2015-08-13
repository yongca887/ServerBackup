<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 14/12/22
 * Time: 下午3:17
 */
function filled_out($form_vars) {
    foreach ($form_vars as $key => $value) {
        if(!isset($key) || ($key == '')) {
            return false;
        }
    }

    return true;
}

function valid_email($address) {
    if (mb_ereg('^[a-zA-Z0-9_\.\-]+@[a-zA_Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address)) {
        return true;
    } else {
        return false;
    }
}