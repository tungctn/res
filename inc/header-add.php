<?php

if (isset($_POST['btn_add'])) {
    global $conn;
    $error = array();
    if (empty($_POST['res_name'])) {
        $error['res_name'] = "Khong duoc de trong ten nha hang";
    } else {
        
        $res_name = $_POST['res_name'];
        // $_SESSION['res_name'] = $res_name;
    }
    if (empty($_POST['res_local'])) {
        $error['res_local'] = "Khong duoc de trong dia chi";
    } else {
        $res_local = $_POST['res_local'];
        // $_SESSION['res_name'] = $res_name;
    }
    if (empty($_POST['res_email'])) {
        $error['res_email'] = "Khong duoc de trong Email";
    } else {
        $partten = " /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/";
        if (!preg_match($partten, $_POST['res_email'], $matchs)) {
            $error['res_email'] = "Email khong dung dinh dang";
        } else {
            $res_email = $_POST['res_email'];
            // $_SESSION['res_email'] = $res_email;
        }
    }
    if (empty($_POST['res_number'])) {
        $error['res_number'] = "Khong duoc de trong so dien thoai";
    } else {
        $partten = " /^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/";
        if (!preg_match($partten, $_POST['res_number'], $matchs)) {
            $error['res_number'] = "So dien thoai khong dung dinh dang";
        }
        // else if (!exist_numphone($_POST['res_number'])) {
        //     $error['res_number'] = "So dien thoai da ton tai";
        // } 
        else {
            $res_number = $_POST['res_number'];
            // $_SESSION['res_number'] = $res_number;
        }
    }

    if (isset($_FILES['res_file'])) {
        $upload_dir = "public/image/";
        $upload_file = $upload_dir . $_FILES['res_file']['name'];

        $_POST['res_file'] = $upload_file;
        // $_SESSION['res_file'] = $upload_file;
        // print_r($_FILES);
        if (move_uploaded_file($_FILES['res_file']['tmp_name'], $upload_file)) {
            echo "da upload thanh cong";
        } else {
            echo "upload that bai";
        }
    }

    if (empty($_POST['res_des'])) {
        $error['res_des'] = "Khong duoc de trong mieu ta";
    } else {
        $res_des = $_POST['res_des'];
    }
    
    if (empty($error)) {
        $sql = "INSERT INTO `info` (`name` , `phone`, `img`, `detail`,`email`,`local`)" . "VALUES ('{$res_name}','{$res_number}','{$upload_file}','{$res_des}','{$res_email}','{$res_local}')";
        if (mysqli_query($conn, $sql)) {
            echo "them du lieu thanh cong";
        } else {
            echo "Loi" . mysqli_error($conn);
        }
    }
}

?>

<!doctype html>
<html lang="en">

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Css -->
    <link href="public/css/home.css" rel="stylesheet">
    <!-- Icons -->
    <!-- <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css"> -->

    <meta name="theme-color" content="#7952b3">
    <title>Restaurant</title>

</head>

<body class="d-flex flex-column min-vh-100" style="min-height: 600px;">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Navigation -->
    <nav class="py-2 bg-light border-bottom navbar-fixed-top">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item">
                    <a href="#" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                        <img src="public/image/res.png" alt="mdo" width="32" height="32">
                        <span class="fs-4">Restaurant</span></a>
                </li>
                <li class="nav-item"><a href="?page=home" class="nav-link link-dark px-2 active" aria-current="page">Trang
                        chủ</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Blog</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">About us</a></li>
                <li class="nav-item"><a href="?page=add" class="nav-link link-dark px-2">Add</a></li>
            </ul>
            <!-- Search -->
            <form class="d-flex">
                <input type="search" class="form-control" style="margin-right: 30px;" placeholder="Tìm kiếm" aria-label="Search">
            </form>
            <!-- End search -->
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span><?php echo $_SESSION['user_login']; ?></span>
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                    <li><a class="dropdown-item" href="#">Thanh toán</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="?page=logout">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navigation -->
    <div class="container" style="background-color: white;
    margin-top: 70px;
    border-radius: 16px;">
        <h1 class="text-center">Them nha hang</h1>
        <div class="row">
            <div class="col-md-12 border p-5">
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    <label class="mt-2" for="res_name">Ten nha hang</label>
                    <input class="d-block form-control " type="text" name="res_name" id="res_name">
                    <label for="res_local">Dia chi</label>
                    <input type="text" class="d-block form-control" name="res_local" id="res_local">
                    <label class="mt-2" for="res_email">Email</label>
                    <input class="d-block form-control " type="email" name="res_email" id="res_email">
                    <label class="mt-2" for="res_number">So dien thoai</label>
                    <input class="d-block form-control " type="text" name="res_number" id="res_number">
                    <label class="mt-2" for="res_file">Anh</label>
                    <input class="d-block form-control " type="file" name="res_file" id="res_file">
                    <label class="mt-2" for="res_des">Chi tiet</label>
                    <textarea class="d-block w-100 form-control " name="res_des" id="res_des" rows="7"></textarea>
                    <input class="btn btn-primary mt-5" type="submit" name="btn_add" value="Them nha hang">

                    <a href="?page=home" class="mt-5 btn btn-danger">Quay lai trang chu </a>
                    <?php if (empty($error) && isset($_POST['btn_add'])) {
                        echo "<p class='text-primary mt-3'>Them du lieu thanh cong</p>";
                    }
                    ?>

                </form>
            </div>
        </div>

    </div>