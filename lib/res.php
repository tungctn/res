<?php

function get_res($start = 1, $num_per_page = 3)
{
    // if(!empty($where)) $where = "WHERE {$where}";
    global $conn;
    
    $page = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
    $start = ($page - 1) * $num_per_page;
    $sql = "SELECT * FROM `info` LIMIT {$start} , {$num_per_page}";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $list_res = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list_res[] = $row;
        }
    }
    // echo $num_row . "<br>";
    echo $page . "<br>";
    echo $start . "<br>";
    return $list_res;
}


?>