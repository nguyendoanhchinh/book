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
    $check_slsach = "SELECT soluong FROM sach WHERE s_id='$s_id'";
    $check_slsach_query = mysqli_query($conn, $check_slsach);
    $check_row = mysqli_fetch_assoc($check_slsach_query);

    if ($check_row['soluong'] == 0) {
        echo "<h3 style='text-align: center;color:#c51919;'>Sách đã hết</h3>";
    } else {
        $check_soluong = "SELECT soluong FROM sach WHERE s_id='$s_id'";
        $check_soluong_query = mysqli_query($conn, $check_soluong);
        $row = mysqli_fetch_assoc($check_soluong_query);
        if ($row['soluong'] < $s_qty) {
            echo "<h3 style='text-align: center;color:#c51919;'>Số lượng chỉ còn (" . $check_row['soluong'] . ") sản phẩm</h3>";
        } else {
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
    }
}

if ($action == 'add_product') {
    $s_id = $_POST['s_id'];
    $s_price = $_POST['s_price'];
    $s_sl = $_POST['s_sl'];
    $id = $_SESSION['k_id'];
    $total = $s_price * $s_sl;
    $check_slsach = "SELECT  soluong  FROM sach WHERE s_id='$s_id'";
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
               
                echo "<h3 style='text-align: center;color:#c51919;'>Thêm thất bại</h3>";
            }
        }
    }
}
//
if ($action == 'delete_product') {
    $id_del = $_POST['id'];

    $sql = "DELETE FROM giohang WHERE s_id='$id_del' ";
    echo $sql;
    $query = mysqli_query($conn, $sql);
}
//xóa tất cả sản phẩm
if ($action == 'delete_all') {
    $arr = $_POST['namecheckbox'];
    foreach ($arr as $id) {
        $sql = "DELETE FROM giohang WHERE s_id=$id";
        $query = mysqli_query($conn, $sql);
    }
}


// Thay đổi số lượng sản phẩm và giá tiền
if ($action === 'change_price') {
    $changequantity = $_POST['changequantity'];
    $id_product = $_POST['id_product'];
    $price_product = $_POST['price_product'];

    $check_soluong = "SELECT soluong FROM sach WHERE s_id='$id_product'";
    $check_soluong_query = mysqli_query($conn, $check_soluong);
    $row = mysqli_fetch_assoc($check_soluong_query);

    if ($row['soluong'] < $changequantity) {
        echo "<h3 style='text-align: center;color:#c51919;'>Số lượng chỉ còn (" . $row['soluong'] . ") sản phẩm</h3>";
    } else {
        $total = $price_product * $changequantity;
        $sql = "UPDATE giohang SET gh_soluong=$changequantity, tongtien=$total WHERE s_id=$id_product";
        $query = mysqli_query($conn, $sql);
    }
}

// Tính tổng tiền của các sản phẩm
if ($action == 'tongtien') {
    $id = $_SESSION['k_id'];
    $selectedIds = $_POST['selectedIds'];
    $selectedIdsString = implode(',', $selectedIds);

    $sql = "SELECT SUM(tongtien) AS 'tongtien' FROM giohang WHERE k_id = $id AND s_id IN ($selectedIdsString)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo number_format($row['tongtien']);
}




