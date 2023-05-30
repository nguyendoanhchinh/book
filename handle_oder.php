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
    $sql = "SELECT chitiethd.*, donhang.*, sach.* FROM chitiethd JOIN donhang ON chitiethd.hd_id = donhang.hd_id JOIN khach ON donhang.k_id = khach.k_id JOIN sach ON sach.s_id = chitiethd.s_id WHERE khach.k_id = $k_id  order by donhang.hd_id desc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $orders = [];
        while ($row = mysqli_fetch_assoc($result)) {
            if (!isset($orders[$row['hd_id']])) {
                $orders[$row['hd_id']] = [];
            }
            $orders[$row['hd_id']][] = $row;
        }
        foreach ($orders as $hd_id => $order_items) { ?>
            <table class="table" border="0" cellpadding="0" cellspacing="0">
                <div class="header-cart-item" style="margin-bottom:20px;background: #f5f5f5;">
                    <tbody id="cart-items">
                        <h2 style="color:orangered;margin-left: 89%; font-size: 22px; ">
                            <?php if ($order_items[0]['status'] == 0) {
                                echo "Chờ xác nhận";
                            } elseif ($order_items[0]['status'] == 1) {
                                echo "Chờ lấy hàng";
                            } elseif ($order_items[0]['status'] == 2) {
                                echo "Đang giao";
                            } elseif ($order_items[0]['status'] == 3) {
                                echo "Đã Giao";
                            } elseif ($order_items[0]['status'] == 4) {
                                echo "Đã hủy";
                            } ?>
                        </h2>
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

                <?php if ($item['status'] == 0) { ?>
                <div style="padding:20px 0px;border-top: 1px dotted rgba(0,0,0,.09);">
                    <div class="clearfix " style="color: black;margin-left:80%; ">
                        <p id="total-oder" class="fl-left ">Tổng tiền: <span style="color: red;font-size: 20px;"><?= number_format($order_items[0]['tongtien']) ?></span> đ</p>
                    </div>
                    <p class="btn" id="comment" style="color: black;font-size: 20px;border-radius: 3px;margin-left: 62px;margin-bottom: -57px;">Nhận xét </p>
                    <div class="clearfix" style="margin-left:80%; ">
                        <div class="fl-right" style="display: flex;">
                            <button class="btn" id="checkout-cart" style="background:orangered;color:white;">Mua lại </button>
                            <button class="btn" id="huydon" huydon=<?php echo $item['hd_id'] ?> style="background:#e38706;color:black;font-size: 20px;border-radius: 3px;padding: 10px 21px;">Hủy Đơn</button>
                        </div>
                    </div>
                </div>

                <?php
                } else if ($item['status'] == 1) { ?>
                <div style="padding:20px 0px;border-top: 1px dotted rgba(0,0,0,.09);">
                    <div class="clearfix " style="color: black;margin-left:80%; ">
                        <p id="total-oder" class="fl-left ">Tổng tiền: <span style="color: red;font-size: 20px;"><?= number_format($order_items[0]['tongtien']) ?></span> đ</p>
                    </div>
                    <p class="btn" id="comment" style="color: black;font-size: 20px;border-radius: 3px;margin-left: 62px;margin-bottom: -57px;">Nhận xét </p>
                    <div class="clearfix" style="margin-left:80%; ">
                        <div class="fl-right" style="display: flex;">
                            <button class="btn" id="checkout-cart" style="background:orangered;color:white;">Mua lại </button>
                            <button class="btn" data-toggle="modal" data-target="#myModal" id="huydon" huydon=<?php echo $item['hd_id'] ?> style="background:#e38706;color:black;font-size: 20px;border-radius: 3px;padding: 10px 21px;">Hủy Đơn</button>
                        </div>
                    </div>
                </div>
                <?php } else if ($item['status'] == 2) { ?>
                <div style="padding:20px 0px;border-top: 1px dotted rgba(0,0,0,.09);">
                    <div class="clearfix " style="color: black;margin-left:80%; ">
                        <p id="total-oder" class="fl-left ">Tổng tiền: <span style="color: red;font-size: 20px;"><?= number_format($order_items[0]['tongtien']) ?></span> đ</p>
                    </div>
                    <p class="btn" id="comment" style="color: black;font-size: 20px;border-radius: 3px;margin-left: 62px;margin-bottom: -57px;">Nhận xét </p>
                    <div class="clearfix" style="margin-left:80%; ">
                        <div class="fl-right" style="display: flex;">
                            <button class="btn" id="checkout-cart" style="background:orangered;color:white;">Mua lại </button>
                            <button class="btn" id="nhanhang" nhanhang="<?= $item['hd_id'] ?>" style="background:#24ca45;color:black;    margin-right: 5px;
                    font-size: 20px;
                    border-radius: 3px;
                    padding: 10px 21px;">Đã nhận hàng</button>
                        </div>
                    </div>
                </div> <?php
                    } else if ($item['status'] == 3) { ?>
                <div style="padding:20px 0px;border-top: 1px dotted rgba(0,0,0,.09);">
                    <div class="clearfix " style="color: black;margin-left:80%; ">
                        <p id="total-oder" class="fl-left ">Tổng tiền: <span style="color: red;font-size: 20px;"><?= number_format($order_items[0]['tongtien']) ?></span> đ</p>
                    </div>
                    <p class="btn" id="comment" style="color: black;font-size: 20px;border-radius: 3px;margin-left: 62px;margin-bottom: -57px;">Nhận xét </p>
                    <div class="clearfix" style="margin-left:80%; ">

                        <div class="fl-right" style="display: flex;">
                            <button class="btn" id="checkout-cart" style="background:orangered;color:white;">Mua lại</button>
                            <button class="btn" id="checkout-cart" style="background:#24ca45;color:black;    margin-right: 5px;
                    font-size: 20px;
                    border-radius: 3px;
                    padding: 10px 21px;">Đánh giá sản phẩm</button>
                        </div>
                    </div>
                </div><?php } else if ($item['status'] == 4) { ?>
                <div style="padding:20px 0px;border-top: 1px dotted rgba(0,0,0,.09);">
                    <div class="clearfix " style="color: black;margin-left:80%; ">
                        <p id="total-oder" class="fl-left ">Tổng tiền: <span style="color: red;font-size: 20px;"><?= number_format($order_items[0]['tongtien']) ?></span> đ</p>
                    </div>
                    <p class="btn" id="comment" style="color: black;font-size: 20px;border-radius: 3px;margin-left: 62px;margin-bottom: -57px;">Nhận xét </p>
                    <div class="clearfix" style="margin-left:80%; ">

                        <div class="fl-right" style="display: flex;">
                            <button class="btn" id="checkout-cart" style="background:orangered;color:white;">Mua lại</button>

                        </div>
                    </div> <?php }
                    }
                }
            }


if ($action == 'nhanhang') {
    $nhanhang = $_POST['nhanhang'];
    $sql = "UPDATE `donhang` SET `status`=3 WHERE `hd_id`='$nhanhang'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
         echo "Đã nhận hàng ";
    } else {
    echo "Nhận hàng  thất bại";
    }
}

if ($action == 'huy_don') {
    $huydon = $_POST['huydon'];
    $sql = "UPDATE `donhang` SET `status`=4 WHERE `hd_id`='$huydon'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
         echo "Đã hủy hàng ";
    } else {
    echo "hủy hàng  thất bại";
    }
}
