<?php


if (isset($_POST['btn_signup'])) {
    $error = array();
    if (empty($_POST['numphone'])) {
        $error['numphone'] = "Khong duoc de trong so dien thoai";
    } else {
        $partten = " /^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/";
        if (!preg_match($partten, $_POST['numphone'], $matchs)) {
            $error['numphone'] = "So dien thoai khong dung dinh dang";
        } else if (!exist_numphone($_POST['numphone'])) {
            $error['numphone'] = "So dien thoai da ton tai";
        } else {
            $numphone = $_POST['numphone'];
        }
    }
    if (empty($_POST['username'])) {
        $error['username'] = "Khong duoc de trong ten dang nhap";
    } else {
        $partten2 = " /^[A-Za-z0-9_\.]{6,32}$/";
        if (!preg_match($partten2, $_POST['username'], $matchs)) {
            $error['username'] = "Ten dang nhap khong dung dinh dang";
        } else if (!exist_username($_POST['username'])) {
            $error['username'] = "Ten dang nhap da ton tai";
        } else {
            $username = $_POST['username'];
        }
    }
    if (empty($_POST['password'])) {
        $error['password'] = "Khong duoc de trong mat khau";
    } else {
        $partten2 = " /^[A-Za-z0-9_\.!@#%&*]{8,32}$/";
        if (!preg_match($partten2, $_POST['password'], $matchs)) {
            $error['password'] = "Mat khau khong dung dinh dang";
        } else {
            $password = $_POST['password'];
        }
    }
    if (empty($_POST['email'])) {
        $error['email'] = "Khong duoc de trong Email";
    } else {
        $partten3 = " /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/";
        if (!preg_match($partten3, $_POST['email'], $matchs)) {
            $error['email'] = "Email khong dung dinh dang";
        } else {
            $email = $_POST['email'];
        }
    }
    if (empty($error)) {
        // if (check_login($_POST['username'], $_POST['password'])) {
        $_SESSION['is_login'] = true;
        $_SESSION['user_login'] = $_POST['username'];
        // if(isset($_POST['remember'])) {
        //     setcookie('is_login',true,time()+3600);
        //     setcookie('user_login',$_POST['username'],time()+3600);
        // }
        // redict_to("?page=home");
        // echo "dang ky thanh cong";
        if (empty($error)) {
            $sql = "INSERT INTO `users` (`numphone` , `username`, `password`, `email`)" . "VALUES ('{$numphone}','{$username}','{$password}','{$email}')";
            if (mysqli_query($conn, $sql)) {
                // echo "them du lieu thanh cong";
            } else {
                echo "Loi" . mysqli_error($conn);
            }
        } else {
            // $error['duplicate'] = "Username da ton tai";
            
        }
        // } else {

        //     $error['account'] = "Tai khoan khong ton tai tren he thong";
        //     // echo "dang nhap that bai";
        // }
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
    <link rel="stylesheet" href="public/css/dangky.css">
    <title>Form -Login</title>
</head>

<body>
    <style>
        #btn_signup {
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

        #btn_signup:hover {
            background-position: right;

        }

        .error {
            color: red;
        }

        .success {
            color: blue;
        }
    </style>
    <div class="container">
        <form class="form-signup" method="POST">
            <h1>Đăng ký</h1>
            <div class="form-text">
                <input type="text" placeholder="Số điện thoại" id="numphone" name="numphone">
                <?php
                if (!empty($error['numphone'])) {
                ?>
                    <p class="error"><?php echo $error['numphone'] ?></p>
                <?php

                }
                ?>
            </div>
            <div class="form-text">
                <input type="text" name="email" id="email" placeholder="Email" value="">
                <?php
                if (!empty($error['email'])) {
                ?>
                    <p class="error"><?php echo $error['email'] ?></p>
                <?php
                }
                ?>
            </div>
            <div class="form-text">
                <input type="text" name="username" id="username" placeholder="username" value="">
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
            <!-- <button type="button" name="button">Đăng ký</button> -->
            <input type="submit" name="btn_signup" id="btn_signup" value="Đăng ký">
            <?php
            if (empty($error) && isset($_POST['btn_signup'])) {
                echo "<p class='success'>Dang ky thanh cong</p>";
            } else {

            }
            ?>

            <span>Bạn đã có tài khoản? Đăng nhập <a href="?page=login">Tại đây</a></span>
        </form>
    </div>
</body>

</html>