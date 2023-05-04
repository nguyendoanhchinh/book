<div class="tg-widgetcontent" id="category_details">
    <?php
    include "database/connect.php";
    $sql = "SELECT theloai.tl_id, theloai.tl_ten, COUNT(sach.tl_id) as tongsosach 
            								FROM theloai 
            								LEFT JOIN sach ON sach.tl_id = theloai.tl_id 
            								GROUP BY theloai.tl_id, theloai.tl_ten";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) { ?>
        <ul id="parent">
            <li data-value="<?php echo $row['tl_id'] ?> ">
                <a href="#"><span><?php echo $row['tl_ten'] ?></span><em><?php echo $row['tongsosach'] ?></em></a>
            </li>
        </ul>
    <?php }
    ?>
</div>