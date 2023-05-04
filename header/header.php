<?php

if (!isset($_SESSION['k_email']) && !isset($_SESSION['k_avatar'])) {
    header('location:login.php');
}
include "database/connect.php";

?>
<header id="tg-header" class="tg-header tg-haslayout">
    <div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="tg-userlogin">
                        <figure>
                            <a href="index.php"><img src="images/image/avatar/<?php echo $_SESSION['k_avatar'] ?>" alt="image description"></a>
                        </figure>
                        <span><a href="logout.php">Đăng xuất</a></span>
                        <span><?php echo ($_SESSION['k_email']) ?></span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="index.php"><img src="images/logo.png" alt="company name here"></a></strong>
                    <div class="tg-wishlistandcart">
                        <!-- <div class="dropdown tg-themedropdown tg-wishlistdropdown">
                                    <a href="#" id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="tg-themebadge">3</span>
                                        <i class="icon-heart"></i>
                                        <span>Wishlist</span>
                                    </a>
                                    <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
                                        <div class="tg-description">
                                            <p>No products were added to the wishlist!</p>
                                        </div>
                                    </div>
                                </div> -->
                        <div class="dropdown tg-themedropdown tg-minicartdropdown">
                            <a href="#" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="tg-themebadge">3</span>
                                <i class="icon-cart"></i>
                                <span>Giỏ hàng</span>
                            </a>
                            <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                                <div class="tg-minicartbody">
                                    <div class="tg-minicarproduct">
                                        <figure>
                                            <img src="images/products/img-01.jpg" alt="image description">

                                        </figure>
                                        <div class="tg-minicarproductdata">
                                            <h5><a href="#">Our State Fair Is A Great Function</a></h5>
                                            <h6><a href="#">$ 12.15</a></h6>
                                        </div>
                                    </div>
                                    <div class="tg-minicarproduct">
                                        <figure>
                                            <img src="images/products/img-02.jpg" alt="image description">

                                        </figure>
                                        <div class="tg-minicarproductdata">
                                            <h5><a href="#">Bring Me To Light</a></h5>
                                            <h6><a href="#">$ 12.15</a></h6>
                                        </div>
                                    </div>
                                    <div class="tg-minicarproduct">
                                        <figure>
                                            <img src="images/products/img-03.jpg" alt="image description">

                                        </figure>
                                        <div class="tg-minicarproductdata">
                                            <h5><a href="#">Have Faith In Your Soul</a></h5>
                                            <h6><a href="#">$ 12.15</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="tg-minicartfoot">
                                    <a class="tg-btnemptycart" href="#">
                                        <i class="fa fa-trash-o"></i>
                                        <span>Clear Your Cart</span>
                                    </a>
                                    <span class="tg-subtotal">Subtotal: <strong>35.78</strong></span>
                                    <div class="tg-btns">
                                        <a class="tg-btn tg-active" href="#">View Cart</a>
                                        <a class="tg-btn" href="#">Checkout</a>
                                    </div>
                                </div>
                            </div>
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



                                <li><a href="contactus.php" style="margin-right: 50px;">Liên hệ</a></li>
                                <li class="menu-item-has-children current-menu-item" style="margin-right: 50px;">
                                <li><a href="aboutus.php">Về chúng tôi</a></li>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>