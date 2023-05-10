<?php
include "database/connect.php";

session_start();
$action = $_POST['action'];
if ($action == 'add') {
    $s_id = $_POST['s_id'];
    $s_price = $_POST['s_price'];
    $s_qty = $_POST['s_qty'];
    $id = $_SESSION['k_id'];
    $total = $s_price * $s_qty;
    $check_sql = "SELECT * FROM giohang WHERE k_id='$id' AND s_id='$s_id'";
    $check_query = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_query) > 0) {
        echo "<h3 style='text-align: center;color:#c51919;'>Sản phẩm đã có trong giỏ hàng</h3>";
    } else {
        $sql = "INSERT INTO giohang (k_id, s_id, gh_soluong, tongtien, trangthai) VALUES ('$id', '$s_id', '$s_qty', '$total', '0')";
        $query = mysqli_query($conn, $sql);

        if ($query) {

            echo "<h3 style='text-align: center;color:#c51919;'>Thêm thành công</h3>";
        } else {
        
            echo "<h3 style='text-align: center;color:#c51919;'>Thêm thất bại</h3>";
        }
    }
}

if ($action == 'add_product') {
    $s_id = $_POST['s_id'];
    $s_price = $_POST['s_price'];
    $s_sl = $_POST['s_sl'];
    $id = $_SESSION['k_id'];
    $total = $s_price * $s_sl;
    $check_slsach = "SELECT soluong FROM sach WHERE s_id='$s_id'";
    $check_slsach_query = mysqli_query($conn, $check_slsach);
    $check_row = mysqli_fetch_assoc($check_slsach_query);
    if ($check_row['soluong'] == 0) {

        echo "<h3 style='text-align: center;color:#c51919;'>Sách đã hết</h3>";
    } else {

        $check_sql = "SELECT * FROM giohang WHERE k_id='$id' AND s_id='$s_id'";
        $check_query = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_query) > 0) {
            echo "<h3 style='text-align: center;color:#c51919;'>Sản phẩm đã có trong giỏ hàng</h3>";
        } else {
            $sql = "INSERT INTO giohang (k_id, s_id, gh_soluong, tongtien, trangthai) VALUES ('$id', '$s_id', '$s_sl', '$total', '0')";

            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<h3 style='text-align: center;color:#c51919;'>Thêm thành công</h3>";
            } else {
                // Error inserting data
                echo "<h3 style='text-align: center;color:#c51919;'>Thêm thất bại</h3>";
            }
        }
    }
}
if($action=='delete_product'){
    $id_del=$_POST['id'];
    $id = $_SESSION['k_id'];
 
    $sql = "DELETE FROM giohang WHERE s_id='$id_del' and k_id='$id'";
    echo $sql;
    $query = mysqli_query($conn, $sql);
}
//xóa tất cả sản phẩm
if($action=='delete_all'){
   
    $sql = "DELETE FROM giohang ";
    echo $sql;
    $query = mysqli_query($conn, $sql);
}