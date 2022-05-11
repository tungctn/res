<?php
unset($_SESSION['is_login']);
unset($_SESSION['user_login']);
$_SESSION['is_login'] = false; 
redict_to("?page=login");
echo "dang xuat";