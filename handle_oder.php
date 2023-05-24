<?php
// nếu trạng thái bằng 0 : chờ xác nhận
// nếu trạng thái bằng 1 : chờ lấy hàng
// nếu trạng thái bằng 2 : đang giao
// nếu trạng thái bằng 3 : đã giao
// nếu trạng thái bằng 4 : đã hủy
// donhang.action = 0
include "database/connect.php";

session_start();
$action = $_POST['action'];


if ($action == 'getAll') {
        $k_id = $_SESSION['k_id'];
        $sql = "SELECT chitiethd.*, donhang.*, sach.*
                FROM chitiethd
                JOIN donhang ON chitiethd.hd_id = donhang.hd_id
                JOIN khach ON donhang.k_id = khach.k_id
                JOIN sach ON sach.s_id = chitiethd.s_id
                WHERE khach.k_id = $k_id  and donhang.status=0";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $orders = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $orders[$row['hd_id']][] = $row;
            }
            foreach ($orders as $hd_id => $order_items) {?>
                <table class="table" border="0" cellpadding="0" cellspacing="0">
                    <div class="header-cart-item" style="margin-bottom:20px;background: #f5f5f5;">
                        <tbody id="cart-items">
                            <h2 style="color:orangered;margin-left: 89%; font-size: 22px; ">Chờ xác nhận</h2>
                            <hr>
                            <thead>
                                <tr>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Gía</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <?php foreach ($order_items as $item) { ?>
                                <tr>
                                    <td>
                                        <a href="#" title="" class="thumb"><img style="width:90px;" src="images/Image/VanHoc/<?= $item['anh']; ?>" alt=""></a>
                                    </td>
                                    <td style=" width: 26%; box-sizing: border-box;">
                                        <a style="word-wrap: break-word;" href="#" title="" class="name-product "><?= $item['s_ten']; ?></a>
                                    </td>
                                    <td><?= number_format(($item['s_gia']) - (($item['s_gia']) * ($item['s_giamgia'])) / 100); ?></td>
                                    <td>
                                        <a id="text" type="text" name="num-order" value="" class="num-order"><?= $item['sluong']; ?></a>
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
                    <p class="btn" id="comment" style="color: black;font-size: 20px;border-radius: 3px;margin-left: 62px;margin-bottom: -57px;">Nhận xét </p>
                    <div class="clearfix" style="margin-left:80%; ">
                        <div class="fl-right" style="display: flex;">
                            <button class="btn" id="checkout-cart" style="background:orangered;color:white;">Mua lại </button>
                            <button class="btn" id="checkout-cart" style="background:#e38706;color:black;">Hủy Đơn</button>
                        </div>
                    </div>
                </div>

            <?php
            }
        }
    }
   
    if ($status = 1) { {
        $k_id = $_SESSION['k_id'];
        $sql = "SELECT chitiethd.*, donhang.*, sach.*
                    FROM chitiethd
                    JOIN donhang ON chitiethd.hd_id = donhang.hd_id
                    JOIN khach ON donhang.k_id = khach.k_id
                    JOIN sach ON sach.s_id = chitiethd.s_id
                    WHERE khach.k_id = $k_id  and donhang.status=$status";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $orders = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $orders[$row['hd_id']][] = $row;
            }
            foreach ($orders as $hd_id => $order_items) {
            ?>
                <table class="table" border="0" cellpadding="0" cellspacing="0">
                    <div class="header-cart-item" style="margin-bottom:20px;background: #f5f5f5;">
                        <tbody id="cart-items">
                            <h2 style="color:orangered; margin-left: 89%;font-size: 22px; ">Chờ lấy hàng</h2>
                            <hr>
                            <?php foreach ($order_items as $item) { ?>
                                <tr>
                                    <td>
                                        <a href="#" title="" class="thumb"><img style="width:90px;" src="images/Image/VanHoc/<?= $item['anh']; ?>" alt=""></a>
                                    </td>
                                    <td style=" width: 26%; box-sizing: border-box;">
                                        <a style="word-wrap: break-word;" href="#" title="" class="name-product "><?= $item['s_ten']; ?></a>
                                    </td>
                                    <td><?= number_format(($item['s_gia']) - (($item['s_gia']) * ($item['s_giamgia'])) / 100); ?></td>
                                    <td>
                                        <a id="text" type="text" name="num-order" value="" class="num-order"><?= $item['sluong']; ?></a>
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
                    <p class="btn" id="comment" style="color: black;font-size: 20px;border-radius: 3px;margin-left: 62px;margin-bottom: -57px;">Nhận xét </p>
                    <div class="clearfix" style="margin-left:80%; ">
                        <div class="fl-right" style="display: flex;">
                            <button class="btn" id="checkout-cart" style="background:orangered;color:white;">Mua lại </button>
                            <button class="btn" id="checkout-cart" style="background:#e38706;color:black;">Hủy Đơn</button>
                        </div>
                    </div>
                </div>

            <?php
            }
        }
    }
    }
    if ($status = 2) { {
        $k_id = $_SESSION['k_id'];
        $sql = "SELECT chitiethd.*, donhang.*, sach.*
                    FROM chitiethd
                    JOIN donhang ON chitiethd.hd_id = donhang.hd_id
                    JOIN khach ON donhang.k_id = khach.k_id
                    JOIN sach ON sach.s_id = chitiethd.s_id
                    WHERE khach.k_id = $k_id  and donhang.status=$status";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $orders = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $orders[$row['hd_id']][] = $row;
            }
            foreach ($orders as $hd_id => $order_items) {
            ?>
                <table class="table" border="0" cellpadding="0" cellspacing="0">
                    <div class="header-cart-item" style="margin-bottom:20px;background: #f5f5f5;">
                        <tbody id="cart-items">
                            <h2 style="color:orangered; margin-left: 89%;font-size: 22px; ">Đang Giao</h2>
                            <hr>
                            <?php foreach ($order_items as $item) { ?>
                                <tr>
                                    <td>
                                        <a href="#" title="" class="thumb"><img style="width:90px;" src="images/Image/VanHoc/<?= $item['anh']; ?>" alt=""></a>
                                    </td>
                                    <td style=" width: 26%; box-sizing: border-box;">
                                        <a style="word-wrap: break-word;" href="#" title="" class="name-product "><?= $item['s_ten']; ?></a>
                                    </td>
                                    <td><?= number_format(($item['s_gia']) - (($item['s_gia']) * ($item['s_giamgia'])) / 100); ?></td>
                                    <td>
                                        <a id="text" type="text" name="num-order" value="" class="num-order"><?= $item['sluong']; ?></a>
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
                    <p class="btn" id="comment" style="color: black;font-size: 20px;border-radius: 3px;margin-left: 62px;margin-bottom: -57px;">Nhận xét </p>
                    <div class="clearfix" style="margin-left:80%; ">
                        <div class="fl-right" style="display: flex;">
                            <button class="btn" id="checkout-cart" style="background:orangered;color:white;" >Mua lại </button>
                            <button class="btn" id="nhanhang" nhanhang ="<?= $item['hd_id'] ?>" style="background:#19d168;color:black;">Đã nhận hàng</button>
                        </div>
                    </div>
                </div>

            <?php
            }
        }
    }
    }
    if ($status = 3) { {
        $k_id = $_SESSION['k_id'];
        $sql = "SELECT chitiethd.*, donhang.*, sach.*
                    FROM chitiethd
                    JOIN donhang ON chitiethd.hd_id = donhang.hd_id
                    JOIN khach ON donhang.k_id = khach.k_id
                    JOIN sach ON sach.s_id = chitiethd.s_id
                    WHERE khach.k_id = $k_id  and donhang.status=$status";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $orders = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $orders[$row['hd_id']][] = $row;
            }
            foreach ($orders as $hd_id => $order_items) {
            ?>
                <table class="table" border="0" cellpadding="0" cellspacing="0">
                    <div class="header-cart-item" style="margin-bottom:20px;background: #f5f5f5;">

                        <tbody id="cart-items">
                            <h2 style="color:orangered; margin-left: 89%; font-size: 22px;">Đã giao</h2>
                            <hr>
                            <?php foreach ($order_items as $item) { ?>
                                <tr>
                                    <td>
                                        <a href="#" title="" class="thumb"><img style="width:90px;" src="images/Image/VanHoc/<?= $item['anh']; ?>" alt=""></a>
                                    </td>
                                    <td style=" width: 26%; box-sizing: border-box;">
                                        <a style="word-wrap: break-word;" href="#" title="" class="name-product "><?= $item['s_ten']; ?></a>
                                    </td>
                                    <td><?= number_format(($item['s_gia']) - (($item['s_gia']) * ($item['s_giamgia'])) / 100); ?></td>
                                    <td>
                                        <a id="text" type="text" name="num-order" value="" class="num-order"><?= $item['sluong']; ?></a>
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
                    <p class="btn" id="comment" style="color: black;font-size: 20px;border-radius: 3px;margin-left: 62px;margin-bottom: -57px;">Nhận xét </p>
                    <div class="clearfix" style="margin-left:80%; ">

                        <div class="fl-right" style="display: flex;">
                            <button class="btn" id="checkout-cart" style="background:orangered;color:white;">Mua lại</button>
                            <button class="btn" id="checkout-cart" style="background:#fff;color:black;">Liên hệ người bán</button>
                        </div>
                    </div>
                </div>

            <?php
            }
        }
    }
    }

    if ($status = 4) { {
        $k_id = $_SESSION['k_id'];
        $sql = "SELECT chitiethd.*, donhang.*, sach.*
                FROM chitiethd
                JOIN donhang ON chitiethd.hd_id = donhang.hd_id
                JOIN khach ON donhang.k_id = khach.k_id
                JOIN sach ON sach.s_id = chitiethd.s_id
                WHERE khach.k_id = $k_id  and donhang.status=$status";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $orders = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $orders[$row['hd_id']][] = $row;
            }
            foreach ($orders as $hd_id => $order_items) {
            ?>
                <table class="table" border="0" cellpadding="0" cellspacing="0">
                    <div class="header-cart-item" style="margin-bottom:20px;background: #f5f5f5;">
                        <tbody id="cart-items">
                            <h2 style="color:orangered;margin-left: 89%;  font-size: 22px;" class="mess">Đã Hủy</h2>
                            <hr>
                            <?php foreach ($order_items as $item) { ?>
                                <tr>
                                    <td>
                                        <a href="#" title="" class="thumb"><img style="width:90px;" src="images/Image/VanHoc/<?= $item['anh']; ?>" alt=""></a>
                                    </td>
                                    <td style=" width: 26%; box-sizing: border-box;">
                                        <a style="word-wrap: break-word;" href="#" title="" class="name-product "><?= $item['s_ten']; ?></a>
                                    </td>
                                    <td><?= number_format(($item['s_gia']) - (($item['s_gia']) * ($item['s_giamgia'])) / 100); ?></td>
                                    <td>
                                        <a id="text" type="text" name="num-order" value="" class="num-order"><?= $item['sluong']; ?></a>
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
                    <p class="btn" id="comment" style="color: black;font-size: 20px;border-radius: 3px;margin-left: 62px;margin-bottom: -57px;">Nhận xét </p>
                    <div class="clearfix" style="margin-left:80%; ">
                        <div class="fl-right" style="display: flex;">

                            <button class="btn" id="checkout-cart" style="background:orangered;color:white;">Mua lại</button>
                            <button class="btn" id="checkout-cart" style="background:#fff;color:black;">Liên hệ người bán</button>
                        </div>
                    </div>
                </div>

    <?php
            }
        }
    }
}

if($action='nhanhang'){
    $nhanhang = $_POST['nhanhang'];
    $sql = "UPDATE `donhang` SET `status`=3 WHERE `hd_id`='$nhanhang'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Đã nhận hàng ";
    } else {
        echo "Nhận hàng  thất bại";
    }
}
