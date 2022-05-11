<?php
    $conn = mysqli_connect('localhost','root','','tung');
    if(!$conn) {
        echo "ket noi that bai" . mysqli_connect_error();
        die();
    } else {
        // echo "ket noi thanh cong";
    }
?>