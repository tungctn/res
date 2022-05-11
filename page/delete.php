<?php
$id = (int) $_GET['id'];
global $list_res;
global $conn;
for ($i=0; $i < sizeof($list_res); $i++) { 
    # code...
    if($i == $id) {
        $id_ = $list_res[$i]['id'];
    }
}

$sql = "DELETE FROM `info` WHERE `id` = {$id_} ";
if(mysqli_query($conn, $sql)) {
    echo "xoa du lieu thanh cong";
    redict_to("?page=home");
} else {
    echo "Loi: ".$sql . mysqli_error($conn);
}

?>