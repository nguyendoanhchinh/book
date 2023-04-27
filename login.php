<?php
session_start();
if (isset($_SESSION['k_email'])) {
    header("location:index.php");
}
require("database/connect.php");
if (isset($_POST['btn_login'])) {
    if (!empty($_POST['email_login']) and !empty($_POST['password'])) {
        $email = $_POST['email_login'];
        $password = $_POST['password'];
        $sql = "Select * from khach where k_email ='$email' and k_password ='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            if ($row['status'] == 0) {
                $_SESSION['k_email'] = $row['k_ten'];
                $_SESSION['k_avatar'] = $row['k_avatar'];
                header("location:index.php");
            } else {
                $_SESSION['k_email'] = $row['k_ten'];
                header("location:admin/index.php");
            }
        } else {
            $_SESSION['message'] = 'Tài khoản mật khẩu không chính xác!';
        }
    } else {
        $_SESSION['message'] = 'Bạn cần nhập đầy đủ thông tin!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="images/Image/logo.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h2 class="text-center pb-3">LOGIN</h2>
                    <?php if (isset($_POST['btn_login']) && isset($_SESSION['message'])) : ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['message']; ?></div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>
                    <form action="login.php" method="post">
                        <!-- Nhập tài khoản Email -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" name="email_login" class="form-control form-control-lg" placeholder="Enter a valid email address" autocomplete="off"/>
                        </div>
                        <!-- Nhập mật khẩu-->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" />
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" name="btn_login" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#" class="link-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
</body>

</html>