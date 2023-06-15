<?php
include "../database/connect.php";
$action = $_POST['action'];
if ($action == "xacnhandonhang") {
    $hd_id = $_POST['hd_id'];
    $sql = "UPDATE `donhang` SET `status`=1 WHERE `hd_id`='$hd_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Xác nhận đơn hàng ";
    } else {
        echo "Đơn hàng thất bại";
    }
}

if ($action == "giaohang") {
    $giaohang = $_POST['giaohang'];
    $sql = "UPDATE `donhang` SET `status`=2 WHERE `hd_id`='$giaohang'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Đang  giao hàng ";
    } else {
        echo "giao hàng thất bại";
    }
}

if($action=="bienlai"){
    $madonhang = $_POST['madonhang'];
    $sql="SELECT * FROM `chitiethd` INNER JOIN sach on chitiethd.s_id=sach.s_id WHERE chitiethd.hd_id =  $madonhang";
    $result=mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)){?>
        <p>Id:<?=  $row['s_id']?> ;Tên sách :<?= $row['s_ten']?><br> 
        <img src="../images/Image/VanHoc/<?php echo $row['anh']; ?> " alt="" style="width: 55px; height: 55px" />
        <p style="color:brown" >Gía sách :<?= number_format($row['s_gia'])?></p>
        <p style="color:brown">số lượng :<?= $row['sluong']?></p>
   <?php }
}