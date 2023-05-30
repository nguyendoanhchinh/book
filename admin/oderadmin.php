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

    .fixed-width th,
    .fixed-width td {
        width: 100px;
        /* Độ dài cố định */
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
                    <div class=" mt-5">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs justify-content-around" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#choxacnhan" type="button" role="tab" aria-controls="home" aria-selected="true">Chờ xác Nhận</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#cholayhang" type="button" role="tab" aria-controls="profile" aria-selected="false">Chờ lấy hàng</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="dangchuyen" data-bs-toggle="tab" data-bs-target="#dangvanchuyen" type="button" role="tab" aria-controls="contact" aria-selected="false">Đang vận chuyển</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#thanhcong" type="button" role="tab" aria-controls="contact" aria-selected="false">Thành công</button>
                            </li>
                        </ul>


                        <!-- Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="choxacnhan" role="tabpanel" aria-labelledby="home-tab">
                                <?php
                                $sql = "SELECT chitiethd.*, donhang.*, sach.*,khach.*
                                FROM chitiethd
                                JOIN donhang ON chitiethd.hd_id = donhang.hd_id
                               INNER JOIN khach ON donhang.k_id = khach.k_id
                                JOIN sach ON sach.s_id = chitiethd.s_id
                                WHERE    donhang.status=0 ORDER by donhang.hd_id DESC";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $orders = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $orders[$row['hd_id']][] = $row;
                                    }
                                    foreach ($orders as $hd_id => $order_items) { ?>
                                        <table class="table" border="0" cellpadding="0" cellspacing="0">
                                            <div class="header-cart-item" style="margin-bottom:20px;background: #f5f5f5;">
                                                <tbody id="cart-items">

                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Khách</th>
                                                            <th scope="col">SĐT</th>
                                                            <th scope="col">Địa chỉ</th>
                                                            <th scope="col">Ảnh </th>
                                                            <th scope="col">Tên</th>
                                                            <th scope="col">Gía</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Giá tiền</th>
                                                        </tr>
                                                    </thead>

                                                    <?php
                                                    $firstOrder = reset($order_items);
                                                    ?>


                                                    <?php foreach ($order_items as $item) { ?>
                                                        <tr>
                                                            <?php if ($item === reset($order_items)) { ?>
                                                                <td>
                                                                    <p><?php echo $item['k_ten'] ?></p>
                                                                </td>
                                                                <td>
                                                                    <p><?php echo $item['k_sdt'] ?></p>
                                                                </td>
                                                                <td>
                                                                    <p><?php echo $item['k_diachi'] ?></p>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            <?php } ?>

                                                            <td>
                                                                <a href="#" title="" class="thumb"><img style="width:90px;" src="Image/VanHoc/<?= $item['anh']; ?>" alt=""></a>
                                                            </td>
                                                            <td style="width: 26%; box-sizing: border-box;">
                                                                <a style="text-decoration: none;color: black;" href="#" title="" class="name-product "><?= $item['s_ten']; ?></a>
                                                            </td>
                                                            <td><?= number_format(($item['s_gia']) - (($item['s_gia']) * ($item['s_giamgia'])) / 100); ?></td>
                                                            <td>
                                                                <a style="text-decoration: none;color: black;" id="text" type="text" name="num-order" value="" class="num-order"><?= $item['sluong']; ?></a>
                                                            </td>
                                                            <td class="loadproduct"><?= number_format((($item['s_gia']) - (($item['s_gia']) * ($item['s_giamgia'])) / 100) * $item['sluong']); ?></td>
                                                        </tr>
                                                        <input type="hidden" id="don_status" status_don="<?= $item['status'] ?>">
                                                    <?php } ?>
                                                </tbody>
                                            </div>
                                        </table>
                                        <div style="padding:20px 0px;border-top: 1px dotted rgba(0,0,0,.09);">
                                            <div class="clearfix " style="color: black;margin-left:80%; ">
                                                <p id="total-oder" class="fl-left ">Tổng tiền: <span style="color: red;font-size: 20px;"><?= number_format($order_items[0]['tongtien']) ?></span> đ</p>
                                            </div>

                                            <div class="clearfix" style="margin-left:80%; ">
                                                <div class="fl-right" style="display: flex;">
                                                    <button class="btn" id="xacnhandon" hd_id="<?php echo $item['hd_id']; ?>" style="background:orangered;color:white;">Xác nhận </button>
                                                    <button class="btn" id="chitietdon" style="background:#2081b6;color:#f4f4f4;">Chi tiết</button>
                                                </div>
                                            </div>
                                        </div>

                                <?php
                                    }
                                } else {
                                    echo "<h2 style='text-align: center;color: red; margin-top:20%;'>Chưa có đơn hàng!</h2>";
                                }
                                ?>
                            </div>
                            <div class="tab-pane fade" id="cholayhang" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="tab-pane fade show active" id="choxacnhan" role="tabpanel" aria-labelledby="home-tab">
                                    <?php
                                    $sql = "SELECT donhang.*, khach.* , SUM(chitiethd.sluong) AS sluong
                                            FROM donhang
                                            INNER JOIN chitiethd ON donhang.hd_id = chitiethd.hd_id
                                            INNER JOIN khach ON donhang.k_id = khach.k_id
                                            WHERE donhang.status = 1
                                            GROUP BY donhang.hd_id ORDER by donhang.hd_id DESC;";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                            <table class="table fixed-width" border="0" cellpadding="0" cellspacing="0">
                                                <div class="header-cart-item" style="margin-bottom:20px;background: #f5f5f5;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID Đơn hàng</th>
                                                            <th scope="col">Tên khách hàng</th>
                                                            <th scope="col">Số điện thoại</th>
                                                            <th scope="col">Địa chỉ</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Ghi chú</th>
                                                            <th scope="col">Ngày mua</th>
                                                            <th scope="col">Tổng tiền</th>
                                                            <th scope="col">Thao tác</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="cart-items">
                                                        <tr>
                                                            <td>
                                                                <p><?php echo $row['hd_id']; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo $row['k_ten']; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo $row['k_sdt']; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo $row['k_diachi']; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?= $row['sluong']; ?></p>

                                                            </td>
                                                            <td><?= $row['note']; ?></td>
                                                            <td>
                                                                <a style="text-decoration: none;color: black;" id="text" type="text" name="num-order" value="" class="num-order"><?= $row['hd_date']; ?></a>
                                                            </td>
                                                            <td>
                                                                <a style="text-decoration: none;color: black;" id="text" type="text" name="num-order" value="" class="num-order"><?= $row['tongtien']; ?></a>
                                                            </td>
                                                            <td class="giaohang">
                                                                <button class="btn btn-success" id="giaohang" giaohang="<?php echo $row['hd_id']; ?>">Giao hàng</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </div>
                                            </table>

                                    <?php
                                        }
                                    } else {
                                        echo "<h2 style='text-align: center;color: red; margin-top:20%;'>Chưa có đơn hàng!</h2>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="dangvanchuyen" role="tabpanel" aria-labelledby="dangchuyen">
                                <?php
                                $sql = "SELECT donhang.*, khach.* , SUM(chitiethd.sluong) AS sluong
                                            FROM donhang
                                            INNER JOIN chitiethd ON donhang.hd_id = chitiethd.hd_id
                                            INNER JOIN khach ON donhang.k_id = khach.k_id
                                            WHERE donhang.status =2
                                            GROUP BY donhang.hd_id ORDER by donhang.hd_id DESC;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>

                                        <table class="table fixed-width" border="0" cellpadding="0" cellspacing="0">
                                            <div class="header-cart-item" style="margin-bottom:20px;background: #f5f5f5;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID Đơn hàng</th>
                                                        <th scope="col">Tên khách hàng</th>
                                                        <th scope="col">Số điện thoại</th>
                                                        <th scope="col">Địa chỉ</th>
                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">Ghi chú</th>
                                                        <th scope="col">Ngày mua</th>
                                                        <th scope="col">Tổng tiền</th>
                                                        <th scope="col">Thao tác</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="cart-items">
                                                    <tr>
                                                        <td>
                                                            <p><?php echo $row['hd_id']; ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $row['k_ten']; ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $row['k_sdt']; ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $row['k_diachi']; ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?= $row['sluong']; ?></p>

                                                        </td>
                                                        <td><?= $row['note']; ?></td>
                                                        <td>
                                                            <a style="text-decoration: none;color: black;" id="text" type="text" name="num-order" value="" class="num-order"><?= $row['hd_date']; ?></a>
                                                        </td>
                                                        <td>
                                                            <a style="text-decoration: none;color: black;" id="text" type="text" name="num-order" value="" class="num-order"><?= $row['tongtien']; ?></a>
                                                        </td>
                                                        <td class="giaohang">
                                                            <button class="btn btn-primary" id="giaohang" giaohang="<?php echo $item['hd_id']; ?>" disabled>Đang vận chuyển ...</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </div>
                                        </table>

                                <?php
                                    }
                                } else {
                                    echo "<h2 style='text-align: center;color: red; margin-top:20%;'>Chưa có đơn hàng!</h2>";
                                }
                                ?>

                            </div>
                            <div class="tab-pane fade" id="thanhcong" role="tabpanel" aria-labelledby="contact-tab">
                                <?php
                                $sql = "SELECT donhang.*, khach.* , SUM(chitiethd.sluong) AS sluong
                                            FROM donhang
                                            INNER JOIN chitiethd ON donhang.hd_id = chitiethd.hd_id
                                            INNER JOIN khach ON donhang.k_id = khach.k_id
                                            WHERE donhang.status =3
                                            GROUP BY donhang.hd_id ORDER by donhang.hd_id DESC;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>

                                        <table class="table fixed-width" border="0" cellpadding="0" cellspacing="0">
                                            <div class="header-cart-item" style="margin-bottom:20px;background: #f5f5f5;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID Đơn hàng</th>
                                                        <th scope="col">Tên khách hàng</th>
                                                        <th scope="col">Số điện thoại</th>

                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">Ghi chú</th>
                                                        <th scope="col">Ngày mua</th>
                                                        <th scope="col">Tổng tiền</th>
                                                        <th scope="col">Thao tác</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="cart-items">
                                                    <tr>
                                                        <td>
                                                            <p><?php echo $row['hd_id']; ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $row['k_ten']; ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $row['k_sdt']; ?></p>
                                                        </td>

                                                        <td>
                                                            <p><?= $row['sluong']; ?></p>

                                                        </td>
                                                        <td><?= $row['note']; ?></td>
                                                        <td>
                                                            <a style="text-decoration: none;color: black;" id="text" type="text" name="num-order" value="" class="num-order"><?= $row['hd_date']; ?></a>
                                                        </td>
                                                        <td>
                                                            <a style="text-decoration: none;color: black;" id="text" type="text" name="num-order" value="" class="num-order"><?= $row['tongtien']; ?></a>
                                                        </td>
                                                        <td class="giaohang" style="display:grid;width:150px;">
                                                            <button class="btn btn-success" id="bienlai" 
                                                            madonhang="<?= $row['hd_id'];  ?>" ngaymua="<?= $row['hd_date'];  ?>"  sodienthoai="<?= $row['k_sdt'];  ?>"
                                                            tongtien="<?= $row['tongtien']; ?>" tenkhach ="<?= $row['k_ten'];  ?>" diachi="<?= $row['k_diachi'];  ?>"
                                                            >Biên lai</button>
                                                            <button class="btn btn-success" id="giaohang" style="margin-top:15px" disabled>Thành công</button>
                                                            
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </div>
                                        </table>

                                <?php
                                    }
                                } else {
                                    echo "<h2 style='text-align: center;color: red; margin-top:20%;'>Chưa có đặt hàng!</h2>";
                                }
                                ?>

                            </div>

                        </div>

                    </div>
                </div>
        </div>

        </main>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <h2 class="text-center">BOOK STORE</h2>
                            <div class="row mb-3 align-items-center">
                                <div class="col-6">
                                    <label class="form-label">Mã đơn hàng:</label>
                                    <label id="madonhang">123</label> 
                                   <br>
                                    <label class="form-label">Ngày:</label>
                                    <label id="ngaymua">20-12-222</label><br>
                                    <hr>
                                    <label class="form-label">Người gửi: Shop Book</label><br>
                                    <label class="form-label">Địa chỉ: Văn Phú - Hà Đông - Hà Nội</label><br>
                                    <label class="form-label">Số điện thoại: 098888888</label>
                                    <hr>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Người Nhận:</label>
                                    <label id="tenkhachhang"></label><br>
                                    <label class="form-label">Địa chỉ:</label>
                                    <label id="diachikhach"></label><br>
                                    <label class="form-label">Số điện thoại:</label>
                                    <label id="sdtkhach" ></label><br><br><br>
                                    
                                    <hr>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label class="form-label">Sản phẩm:</label>
                                    <p>sản phẩm 1</p>
                                    <p>sản phẩm 2</p>
                                    <p>sản phẩm 3</p>
                                </div>
                                <div class="col-6 d-flex justify-content-center">
                                    <div>
                                        <label class="form-label">Tổng tiền:</label>
                                        <label style="font-size: 30px;color: red;" id="tongtien"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>



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
    <script src="js/oder.js"></script>
</body>

</html>