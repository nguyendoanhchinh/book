<?php

if (!isset($_SESSION['k_email']) && !isset($_SESSION['k_avatar'])) {
    header('location:login.php');
}
include "database/connect.php";

?>
<header id="tg-header" class="tg-header tg-haslayout">
    
    <style>
.img-user a img{
    border-radius: 50%;width: 50px;
    height: 50px;

}
    </style>
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="index.php"><img src="images/logo.png" alt="company name here"></a></strong>
                    <div class="tg-wishlistandcart">
                        <div class="dropdown tg-themedropdown tg-wishlistdropdown img-user">
                       
                                    <a href="index.php"  id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img style="    position: absolute;
    margin-left: -46px;
    top: 10;
    height: 39px;
}"  src="images/image/avatar/<?php echo $_SESSION['k_avatar'] ?>" alt="image description">  
                                    <span style="padding-top: 10px;"><?php echo ($_SESSION['k_email']) ?></span>
                                    </a>
                                    <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
                                        <div class="tg-description">
                                        <span><a href="logout.php">Đăng xuất</a></span>
                                        </div>
                                    </div>
                                </div>
                        <div class="dropdown tg-themedropdown tg-minicartdropdown" style="padding-top: 10px;">
                            <a href="../cart.php" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php   

                                                $sql= "SELECT count(*) as count from giohang";
                                                $query =mysqli_query($conn,$sql);
                                                $row = mysqli_fetch_assoc($query);
                                            ?>   
                            <span class="tg-themebadge" id="hienthisoluong" ><?=$row['count'];?></span>
                                <a href="cart.php"><i style="font-size: 18px; color:black;" class="icon-cart"></i></a>
                                
                            </a>
                          
                            
                        </div>
                    </div>
                    <div class="tg-searchbox">
                        <form class="tg-formtheme tg-formsearch" id="search_form">
                            <fieldset>
                                <input type="text" name="search" id="inputsearch" class="typeahead form-control" placeholder="Tìm kiếm sách..">
                                <button type="submit" id="search_btn"><i class="icon-magnifier"></i></button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-navigationarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <nav id="tg-nav" class="tg-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                            <ul>

                                <li class="menu-item-has-children current-menu-item" style="margin-right: 50px;">
                                    <a href="index.php">Trang Chủ</a>

                                </li>
                                <li class="menu-item-has-children" style="margin-right: 50px;">
                                    <a href="products.php">Sản Phẩm</a>
                                    <ul class="sub-menu">
                                        <li><a href="products.php">Các sản phẩm</a></li>
                                        <li><a href="productdetail.php">Chi tiết sản phẩm</a></li>
                                    </ul>
                                </li>
                               
                                <li class="menu-item-has-children" style="margin-right: 50px;">
                                    <a href="#">Tác giả</a>
                                    <ul class="sub-menu">
                                        <li><a href="authors.php">Các Tác giả</a></li>
                                        <li><a href="authordetail.php">Chi tiết tác giả</a></li>
                                    </ul>
                                </li>
                              

                                <li><a href="aboutus.php">Về chúng tôi</a></li>
                                </li>
                                <li><a href="contactus.php" style="margin-left: 37px;">  Hotline: 1900 6401</a></li>
                                <li class="menu-item-has-children current-menu-item" style="margin-right: 40px;">
                             
                                <li><a href="aboutus.php"> Hỗ trợ trực tuyến</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>