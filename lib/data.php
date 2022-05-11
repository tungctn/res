<?php 

function show_array($data) {
    if(is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

function is_login() {
    if($_SESSION['is_login']) {
        return true;
    }
    return false;
}


