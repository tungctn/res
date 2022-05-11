<?php

function check_login($username, $password)
{
    $new_list = array();
    global $list_user;
    foreach ($list_user as $value) {
        // for($key = 0; $key < sizeof($value); $key++) {
        if ($value['username'] == $username && $value['password'] == ($password)) {
            // $new_username = $value[$key];
            // $new_password = $value[$key+1];
            // if($new_username == $username && $new_password == $password) {
            //     $new_list[1] = $value;
            $new_list[1] = $value;
            show_array($new_list);
            return true;
            
        }
        // }
    }
    return false;
}

function exist_username($username) {
    global $list_user;
    foreach ($list_user as $value) {
        if ($value['username'] == $username) {
            return false;
        }
    }
    return true;
}

function exist_numphone($numphone) {
    global $list_user;
    foreach ($list_user as $value) {
        if ($value['numphone'] == $numphone) {
            return false;
        }
    }
    return true;
}


