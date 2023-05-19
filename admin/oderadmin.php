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
    <title> Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<style>
    
    .nav-link.active {
            border-bottom: 2px solid red;
        }
</style>

<body class="sb-nav-fixed">
    <?php
    include "inc/nav.php";
    ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "inc/sidebar.php"; ?>
        </div>
        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid px-4">

                    <h1 class="mt-4">Quản lý Đơn hàng</h1>
                    <!-- Tabs navs -->
                    <div class="container mt-5">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs justify-content-around" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#choxacnhan" type="button" role="tab" aria-controls="home" aria-selected="true">Chờ xác Nhận</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#cholayhang" type="button" role="tab" aria-controls="profile" aria-selected="false">Chờ lấy hàng</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#dangvanchuyen" type="button" role="tab" aria-controls="contact" aria-selected="false">Đang vận chuyển</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#thanhcong" type="button" role="tab" aria-controls="contact" aria-selected="false">Thành công</button>
                            </li>
                        </ul>


                        <!-- Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="choxacnhan" role="tabpanel" aria-labelledby="home-tab">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Khách hàng</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Sách</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Ghi chú </th>
                                            <th scope="col">Thao tác </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td><button class="btn btn-danger">Chi tiết</button>
                                                <button class="btn btn-primary">Xác nhận</button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="cholayhang" role="tabpanel" aria-labelledby="profile-tab">
                                <h1>Profile</h1>

                            </div>
                            <div class="tab-pane fade" id="dangvanchuyen" role="tabpanel" aria-labelledby="contact-tab">
                                <h1>Contact</h1>

                            </div>
                            <div class="tab-pane fade" id="thanhcong" role="tabpanel" aria-labelledby="contact-tab">
                                <h1>Thành công</h1>

                            </div>
                         
                        </div>
                    </div>
                </div>
                
            </main>
        </div>

    </div>
    <script src="js/category.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

    <script src="js/books.js"></script>
</body>

</html>