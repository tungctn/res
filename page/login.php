<?php


if (isset($_POST['btn_login'])) {
    $error = array();
    if (empty($_POST['username'])) {
        $error['username'] = "Khong duoc de trong ten dang nhap";
    } else {
        $partten2 = " /^[A-Za-z0-9_\.]{6,32}$/";
        if (!preg_match($partten2, $_POST['username'], $matchs)) {
            $error['username'] = "Ten dang nhap khong dung dinh dang";
        }
    }
    if (empty($_POST['password'])) {
        $error['password'] = "Khong duoc de trong mat khau";
    } else {
        $partten2 = " /^[A-Za-z0-9_\.!@#%&*]{8,32}$/";
        if (!preg_match($partten2, $_POST['password'], $matchs)) {
            $error['password'] = "Mat khau khong dung dinh dang";
        }
    }
    if (empty($error)) {
        if (check_login($_POST['username'], $_POST['password'])) {
            $_SESSION['is_login'] = true;
            $_SESSION['user_login'] = $_POST['username'];
            // if(isset($_POST['remember'])) {
            //     setcookie('is_login',true,time()+3600);
            //     setcookie('user_login',$_POST['username'],time()+3600);
            // }
            redict_to("?page=home");
            echo "dang nhap thanh cong";
        } else {

            $error['account'] = "Tai khoan khong ton tai tren he thong";
            // echo "dang nhap that bai";
        }
    }
} else {
    $_SESSION['is_login'] = false;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/dangnhap.css">
    <title>Form -Login</title>
</head>
<style>
    #btn_login {
        height: 35px;
        width: 100%;
        margin-bottom: 30px;
        background: linear-gradient(to bottom right, var(--bg1), var(--bg2), var(--bg1));
        border: none;
        color: #fff;
        border-radius: 5px;
        background-size: 200%;
        transition: 0.5s;
    }

    #btn_login:hover {
        background-position: right;

    }

    .error {
        color: red;
    }
</style>

<body>
    <div class="container">
        <form class="form-login" method="POST">
            <h1>Đăng nhập</h1>
            <div class="form-text">
                <input type="text" name="username" id="username" placeholder="username" value="<?php if (!empty($error))
                                                                                                    echo $_POST['username'];
                                                                                                ?>">
                <?php
                if (!empty($error['username'])) {
                ?>
                    <p class="error"><?php echo $error['username'] ?></p>
                <?php
                }
                ?>
            </div>
            <div class="form-text">
                <input type="password" name="password" id="password" placeholder="password">
                <?php
                if (!empty($error['password'])) {
                ?>
                    <p class="error"><?php echo $error['password'] ?></p>
                <?php
                }
                ?>
            </div>
            <!-- <button type="button" name="button">Đăng nhập</button> -->
            <input type="submit" name="btn_login" id="btn_login" value="Dang nhap">
            <?php
            if (!empty($error['account'])) {
            ?>
                <p class="error"><?php echo $error['account'] ?></p>
            <?php
            }
            ?>
            <span>Bạn chưa có tài khoản? Đăng ký <a href="?page=signup">Tại đây</a></span>
        </form>
    </div>
</body>

</html>

<!-- <div id="content">
    <h1>Trang chu</h1>
</div> -->