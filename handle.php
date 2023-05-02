<?php
include "database/connect.php";
// phân trang

//hiển thị dữ liệu sách
$action = $_POST['action'];
if ($action == 'loadAll') {
   
    if (isset($_POST['minimum_price']) && isset($_POST['maximum_price'])) {
        $min = $_POST['minimum_price'];
        $max = $_POST['maximum_price'];
        $result = mysqli_query($conn, "select count(s_id) as total from sach where s_gia between $min and $max");
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
    
        $current_page = isset($_POST['current_page']) ? intval($_POST['current_page']) : 1;
        $limit = 12;
        //tổng số trang làm  tròn lên
        $total_page = ceil($total / $limit);
        // Tìm trang đầu
        $start = ($current_page - 1) * $limit;
        $min = $_POST['minimum_price'];
        $max = $_POST['maximum_price'];
        $sql = "SELECT * from sach INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
            INNER JOIN theloai ON sach.tl_id = theloai.tl_id where s_gia between $min and $max limit $start,$limit";
    } else {
        $result = mysqli_query($conn, 'select count(s_id) as total from sach');
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];

    $current_page = isset($_POST['current_page']) ? intval($_POST['current_page']) : 1;
    $limit = 12;
    //tổng số trang làm  tròn lên
    $total_page = ceil($total / $limit);
    // Tìm trang đầu
    $start = ($current_page - 1) * $limit;
        // Tạo câu truy vấn SQL mặc định để hiển thị toàn bộ sản phẩm
        $sql = "SELECT * from sach INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
            INNER JOIN theloai ON sach.tl_id = theloai.tl_id limit $start,$limit";
    }
}
//sắp xếp sách
else if ($action == 'sapxep') {
    $result = mysqli_query($conn, 'select count(s_id) as total from sach');
    if($_POST['id_category'] != ''){
        $result = mysqli_query($conn, 'select count(s_id) as total from sach where tl_id ='.$_POST['id_category']);
    }
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];
    $current_page = isset($_POST['current_page']) ? intval($_POST['current_page']) : 1;
    $limit = 12;
    //tổng số trang làm  tròn lên
    $total_page = ceil($total / $limit);
    // Tìm trang đầu
    $start = ($current_page - 1) * $limit;
    $sapxep = $_POST['sapxep'];
    $sql = "SELECT * FROM sach  INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
    INNER JOIN theloai ON sach.tl_id = theloai.tl_id order by " . $sapxep . " limit  $start,$limit";
    if($_POST['id_category'] != ''){
        $sql = "SELECT * FROM sach  INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
    INNER JOIN theloai ON sach.tl_id = theloai.tl_id where theloai.tl_id = ".$_POST['id_category']."  order by " . $sapxep . " limit  $start,$limit";
    
    }
}
// hiển thị theo thể loại
else if ($action == 'theloai') {
    $theloai = $_POST['id_category'];
    $result = mysqli_query($conn, "select count(s_id) as total from sach where tl_id=$theloai");
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];
    $current_page = isset($_POST['current_page']) ? intval($_POST['current_page']) : 1;
    $limit = 12;
    //tổng số trang làm  tròn lên
    $total_page = ceil($total / $limit);
    // Tìm trang đầu
    $start = ($current_page - 1) * $limit;
    $sql = "SELECT sach.*, tacgia.*, theloai.*
    FROM sach
    INNER JOIN theloai ON sach.tl_id = theloai.tl_id
    INNER JOIN tacgia ON sach.tg_id = tacgia.tg_id
    WHERE theloai.tl_id = $theloai limit $start,$limit";
}
 if($action=='timkiem'){
    
    if(isset($_POST['load'])){
        $timkiem = $_POST['load'];
        $result = mysqli_query($conn, "select count(s_id) as total from sach where s_ten = '$timkiem'");
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
        $current_page = isset($_POST['current_page']) ? intval($_POST['current_page']) : 1;
        $limit = 12;
        //tổng số trang làm  tròn lên
        $total_page = ceil($total / $limit);
        // Tìm trang đầu
        $start = ($current_page - 1) * $limit;
        $sql = "SELECT *
        FROM sach INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
        INNER JOIN theloai ON sach.tl_id = theloai.tl_id where s_ten like concat('%$timkiem%')  ";
    }else{
        $result = mysqli_query($conn, 'select count(s_id) as total from sach');
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];

    $current_page = isset($_POST['current_page']) ? intval($_POST['current_page']) : 1;
    $limit = 12;
    //tổng số trang làm  tròn lên
    $total_page = ceil($total / $limit);
    // Tìm trang đầu
    $start = ($current_page - 1) * $limit;
        // Tạo câu truy vấn SQL mặc định để hiển thị toàn bộ sản phẩm
        $sql = "SELECT * from sach INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
            INNER JOIN theloai ON sach.tl_id = theloai.tl_id limit $start,$limit";
    }
    
    
    
 }

$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) { ?>

    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
        <div class="tg-postbook">
            <figure class="tg-featureimg">
                <div class="tg-bookimg">
                    <div class="tg-frontcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                    <div class="tg-backcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                </div><a class="tg-btnaddtowishlist" href="productdetail.php?id=<?php echo $row['s_id']; ?>">
                    <i class="icon-heart"></i><span>Chi tiết</span>
                </a>
            </figure>
            <div class="tg-postbookcontent">
                <ul class="tg-bookscategories">
                    <li><a href="#"><?php echo $row['tl_ten']; ?></a></li>
                </ul>
                <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                <div class="tg-booktitle" style="height:70px;">
                    <h3><a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['s_ten']; ?></a></h3>
                </div>
                <span class="tg-bookwriter" style="margin-top: 38px;">Tác giả: <a href="#"><?php echo $row['tg_ten']; ?></a></span>
                <span class="tg-stars"><span></span></span>
                <span class="tg-bookprice">
                    <ins><?php echo number_format($row['s_gia']);  ?>vnđ</ins>
                    <del><?php echo number_format($row['s_giamgia']); ?>%</del>
                </span>
                <a class="tg-btn tg-btnstyletwo" href="#">
                    <i class="fa fa-shopping-basket"></i>
                    <em>Thêm giỏ hàng</em>
                </a>
            </div>
        </div>
    </div>
<?php } ?>
<div class="tg-products">
    <nav aria-label="Page navigation example" style="padding-left: 23%;
     " id="pagination_book">
        <ul class="pagination">
            <li class="page-item <?php if ($current_page == 1) echo 'disabled'; ?>" page_pagination="<?php if ($current_page == 1) {
                                                                                                            echo '1';
                                                                                                        } else {
                                                                                                            echo $current_page - 1;
                                                                                                        } ?>">
                <a class="page-link" href="#" tabindex="-1">Trang trước</a>
            </li>
            <?php
            $num_links = 1;
            if ($current_page > $num_links + 1) {
            ?>
                <li class="page-item" page_pagination=1>
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
                <?php
            }
            for ($i = max(1, $current_page - $num_links); $i <= min($total_page, $current_page + $num_links); $i++) {
                if ($i == $current_page) {
                ?>
                    <li class="page-item active" page_pagination="<?= $i ?>">
                        <span class="page-link"><?php echo $i; ?></span>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item" page_pagination="<?= $i ?>">
                        <a class="page-link" href="#"><?php echo $i; ?></a>
                    </li>
                <?php
                }
            }
            if ($current_page < $total_page - $num_links) {
                ?>
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
                <li class="page-item" page_pagination="<?= $total_page ?>">
                    <a class="page-link" href="#"><?php echo $total_page; ?></a>
                </li>
            <?php
            }
            ?>
            <li class="page-item <?php if ($current_page == $total_page) echo 'disabled'; ?>" page_pagination="<?php if ($current_page < $total_page) {
                                                                                                                    echo $current_page + 1;
                                                                                                                } else {
                                                                                                                    echo $total_page;
                                                                                                                } ?>">
                <a class="page-link" href="#">Trang sau</a>
            </li>
        </ul>
    </nav>
</div>
<input type="hidden" sapxep="<?php if(isset($_POST['sapxep'])){echo $_POST['sapxep'];} ?>" action=<?=$action?>  id_category="<?php if(isset($_POST['id_category'])){echo $_POST['id_category'];} ?>" id="panigation_cate">