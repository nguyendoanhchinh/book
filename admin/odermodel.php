<?php
include "../database/connect.php";
$action = $_POST['action'];
if ($action = "xacnhandonhang") {
    $hd_id = $_POST['hd_id'];
    $sql = "UPDATE `donhang` SET `status`=1 WHERE `hd_id`='$hd_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Xác nhận đơn hàng ";
    } else {
        echo "Đơn hàng thất bại";
    }
}

if ($action = "giaohang") {
    $giaohang = $_POST['giaohang'];
    $sql = "UPDATE `donhang` SET `status`=2 WHERE `hd_id`='$giaohang'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Đang  giao hàng ";
    } else {
        echo "giao hàng thất bại";
    }
}
if($action='huy_don'){
    $huydon = $_POST['giaohang'];
    $sql = "UPDATE `donhang` SET `status`=4 WHERE `hd_id`='$giaohang'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Đang  giao hàng ";
    } else {
        echo "giao hàng thất bại";
    }
}