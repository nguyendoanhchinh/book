<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="sb-nav-fixed">
    <?php
    include "inc/nav.php";
    ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "inc/sidebar.php"; ?>
        </div>
        <div id="layoutSidenav_content" style="background: azure;">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Trang chủ</h1>
                    <main class="container mt-5 mb-5">

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card mb-2" style="width: 100%;">
                                    <div class="card-body" style="background: #83C75D;">
                                        <h5 class="card-title text-center">
                                            <a href="" class="text-decoration-none text-white">Người dùng</a>
                                        </h5>
                                        <?php
                                        $sql = "select count(*) as `count` from khach";
                                        $query = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($query);

                                        ?>
                                        <h5 class="h1 text-center">
                                            <?php echo $row['count']; ?>
                                        </h5>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card mb-2" style="width: 100%;">
                                    <div class="card-body" style="background: #33CC33;">
                                        <h5 class="card-title text-center">
                                            <a href="categorys.php" class="text-decoration-none text-white">Thể loại</a>
                                        </h5>

                                        <?php
                                        $sql = "select count(*) as `count` from theloai";
                                        $query = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($query);

                                        ?>
                                        <h5 class="h1 text-center">
                                            <?php echo $row['count']; ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card mb-2" style="width: 100%;">
                                    <div class="card-body" style="background: #CC3300;">
                                        <h5 class="card-title text-center">
                                            <a href="authors.php" class="text-decoration-none text-white">Tác giả</a>
                                        </h5>

                                        <?php
                                        $sql = "select count(*) as `count` from tacgia";
                                        $query = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($query);

                                        ?>
                                        <h5 class="h1 text-center">
                                            <?php echo $row['count']; ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card mb-2" style="width: 100%;">
                                    <div class="card-body" style="background: #FF9900;">
                                        <h5 class="card-title text-center">
                                            <a href="books.php  " class="text-decoration-none text-white">Số lượng sách</a>
                                        </h5>
                                        <?php
                                        $sql = "select count(*) as `count` from sach";
                                        $query = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($query);

                                        ?>
                                        <h5 class="h1 text-center">
                                            <?php echo $row['count']; ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>


                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

</body>

</html>