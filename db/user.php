<?php

global $conn;


// $temp = 0;
// $list_user = array();


$sql = "SELECT `numphone`,`username`,`password`,`email` FROM `users`";
$result = mysqli_query($conn, $sql);
$list_user = array();
$num = mysqli_num_rows($result);
for ($i=0; $i < $num; $i++) { 
    # code...
    $list_user[] = mysqli_fetch_assoc($result);
}
// $user = array(
//     1 => array(
//         'id' => 1,
//         'fullname' => 'nguyen tung',
//         'username' => 'tungctn0',
//         'password' => md5('tung2002'),
//     ),
//     2 => array(
//         'id' => 2,
//         'fullname' => 'nguyen tung1',
//         'username' => 'tungctn1',
//         'password' => md5('tung2002'),
//     ),
//     3 => array(
//         'id' => 3,
//         'fullname' => 'nguyen tung2',
//         'username' => 'tungctn2',
//         'password' => md5('tung2002'),
//     ),
// );
