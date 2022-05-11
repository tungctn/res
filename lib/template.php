<?php

function get_header($version = '') {
    if(!empty($version)) {
        require "inc/header-{$version}.php";
    } else {
        require 'inc/header.php';

    }
    
}
function get_footer() {
    require 'inc/footer.php';
}