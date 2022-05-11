<?php

// $sql = "SELECT `numphone`,`username`,`password`,`email` FROM `users`";
// $result = mysqli_query($conn, $sql);
// $list_user = array();
// $num = mysqli_num_rows($result);
// for ($i=0; $i < $num; $i++) { 
//     # code...
//     $list_user[] = mysqli_fetch_assoc($result);

// }
global $conn;
$sql = "SELECT `id`, `name`, `phone`, `img`, `detail`, `email`,`local` FROM `info`";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
$list_res = array();

for ($i=0; $i < $num; $i++) { 
    # code...
    $list_res[] = mysqli_fetch_assoc($result);
}