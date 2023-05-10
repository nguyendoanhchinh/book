<?php
session_start();

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/transitions.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body class="tg-home tg-homeone">

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        <?php include "header/header.php"; ?>
        <!--************************************
				Header End
		*************************************-->

        <!--************************************
					Best Selling Start
			*************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2>Sách bán chạy</h2>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">

                            <?php
                            include "database/connect.php";
                            $sql = "SELECT * from  sach INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
                            INNER JOIN theloai ON sach.tl_id = theloai.tl_id  ORDER BY luotmua DESC LIMIT 10";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($query)) { ?>

                                <div class="item">
                                    <div class="tg-postbook tg-notag">
                                        <figure class="tg-featureimg">
                                            <div class="tg-bookimg">
                                                <div class="tg-frontcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                                                <div class="tg-backcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                                            </div>
                                            <a class="tg-btnaddtowishlist" href="productdetail.php?id=<?php echo $row['s_id']; ?>">
                                                <i class="icon-heart"></i>
                                                <span>Chi tiết</span>
                                            </a>
                                        </figure>
                                        <div class="tg-postbookcontent">
                                            <ul class="tg-bookscategories">
                                                <li><a href="#"><?php echo $row['tl_ten']; ?></a></li>
                                            </ul>
                                            <div class="tg-booktitle" style="width: 110%;float: left;padding: 0 0 20px;height: 41px">
                                                <h3><a href="#"><?php echo $row['s_ten']; ?></a></h3>
                                            </div>
                                            <span class="tg-bookwriter" style="margin-top: 55px; ">Tác giả: <a href="#"><?php echo $row['tg_ten']; ?></a></span>
                                            <span class="tg-stars"><span></span></span>
                                            <span class="tg-bookprice">
                                                <ins><?php echo number_format($row['s_gia']);  ?>vnđ</ins>
                                                <del><?php echo number_format($row['s_giamgia']);  ?>%</del>
                                            </span>
                                            <!-- <a class="tg-btn tg-btnstyletwo" href="productdetail.php?id=<?php echo $row['s_id']; ?>">
                                                <i class="fa fa-shopping-basket"></i>
                                                <em style="font-size: 12px;">Thêm giỏ hàng</em>
                                            </a> -->
                                        </div>
                                    </div>
                                </div>


                            <?php } ?>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <section>

            <div class="tg-productgrid">
                <div class="container ">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2>Sách nổi bật</h2>

                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * from sach  INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
                    INNER JOIN theloai ON sach.tl_id = theloai.tl_id order by rand()   limit 20";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 mt-5">
                            <div class="tg-postbook ">
                                <figure class="tg-featureimg">
                                    <div class="tg-bookimg">
                                        <div class="tg-frontcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                                        <div class="tg-backcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                                    </div>
                                    <a class="tg-btnaddtowishlist" href="productdetail.php?id=<?php echo $row['s_id']; ?>">
                                        <i class="icon-heart"></i>
                                        <span>Chi tiết</span>
                                    </a>
                                </figure>
                                <div class="tg-postbookcontent">
                                    <ul class="tg-bookscategories">
                                        <li><a href="#"><?php echo $row['tl_ten']; ?></a></li>
                                    </ul>
                                    <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                    <div class="tg-booktitle" style="height:50px;">
                                        <h3><a href="#"><?php echo $row['s_ten']; ?></a></h3>
                                    </div>
                                    <span class="tg-bookwriter" style="margin-top: 38px;">Tác giả: <a href="#"><?php echo $row['tg_ten']; ?></a></span>
                                    <span class="tg-stars"><span></span></span>
                                    <span class="tg-bookprice">
                                        <ins><?php echo number_format($row['s_gia']);  ?>vnđ</ins>
                                        <del><?php echo number_format($row['s_giamgia']);  ?>%</del>
                                    </span>
                                    <!-- <form action="">
                                        <a class="tg-btn tg-btnstyletwo" href="cart.php?id=<?php //echo $row['s_id']; ?>">
                                            <i class="fa fa-shopping-basket"></i>
                                            <em>Thêm giỏ hàng</em>
                                        </a>
                                    </form> -->
                                    

                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>

            </div>
        </section>

        <!--************************************
					Best Selling End
			*************************************-->

        <!--************************************
					Featured Item Start
			*************************************-->
        <section class="tg-bglight tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-featureditm" style="margin-top:20px;">
                        <?php
                        include "database/connect.php";
                        $sql = "SELECT *FROM sach JOIN tacgia
												ON sach.tg_id = tacgia.tg_id order by rand() limit 1";

                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
                                <figure><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></figure>
                                <a class="tg-btnaddtowishlist" href="productdetail.php?id=<?php echo $row['s_id']; ?>">
                                    <i class="icon-heart"></i>
                                    <span>Chi tiết</span>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="tg-featureditmcontent">
                                    <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                    <div class="tg-booktitle">
                                        <h3 style="font-size:32px;"><a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['s_ten']  ?></a></h3>
                                    </div>
                                    <span style="margin-top: 10px;" class="tg-bookwriter">Tác giả: <a href="#"><?php echo $row['tg_ten']  ?></a></span>
                                    <span class="tg-stars"><span></span></span>
                                    <div class="tg-priceandbtn" style="margin: 45px -70px;">
                                        <span class="tg-bookprice">
                                            <ins><?php echo number_format($row['s_gia']);  ?>vnđ</ins>
                                            <del><?php echo number_format($row['s_giamgia']);  ?>%</del>
                                        </span>
                                        <!-- <a class="tg-btn tg-btnstyletwo tg-active">
                                            <i class="fa fa-shopping-basket"></i>
                                            <em>Thêm giỏ hàng</em>
                                        </a> -->
                                    </div>
                                </div>
                            </div>

                        <?php }
                        ?>

                    </div>
                </div>
            </div>
        </section>
        <!--************************************
					Featured Item End
			*************************************-->
        <!--************************************
					New Release Start
			*************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-newrelease">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="tg-sectionhead">
                                <h2>Sách mới phát hành</h2>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="tg-newreleasebooks">

                                    <?php
                                    $sql = "SELECT * from sach  INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
								INNER JOIN theloai ON sach.tl_id = theloai.tl_id ORDER BY namxuatban DESC LIMIT 3;";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($query)) { ?>

                                        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-4 hidden-md">
                                            <div class="tg-postbook">
                                                <figure class="tg-featureimg">
                                                    <div class="tg-bookimg">
                                                        <div class="tg-frontcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                                                        <div class="tg-backcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                                                    </div>
                                                    <a class="tg-btnaddtowishlist " href="productdetail.php?id=<?php echo $row['s_id']; ?>">
                                                        <i class="icon-heart"></i>
                                                        <span>Chi tiết</span>
                                                    </a>
                                                </figure>
                                                <div class="tg-postbookcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="#"><?php echo $row['tl_ten']; ?></a></li>
                                                    </ul>
                                                    <div class="tg-booktitle" style="height: 58px;">
                                                        <h3><a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['s_ten']; ?></a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter" style="margin-top: 38px;">Tác giả: <a href="#"><?php echo $row['tg_ten']; ?></a></span>
                                                    <span class="tg-stars"><span></span></span>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--************************************
					New Release End
			*************************************-->
        <!--************************************
					Collection Count Start
			*************************************-->
        <!-- <section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-04.jpg">
            <div class="tg-sectionspace tg-collectioncount tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div id="tg-collectioncounters" class="tg-collectioncounters">
                            <div class="tg-collectioncounter tg-drama">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-bubble"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Drama</h2>
                                    <h3 data-from="0" data-to="6179213" data-speed="8000" data-refresh-interval="50">6,179,213</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-horror">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-heart-pulse"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Horror</h2>
                                    <h3 data-from="0" data-to="3121242" data-speed="8000" data-refresh-interval="50">3,121,242</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-romance">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-heart"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Romance</h2>
                                    <h3 data-from="0" data-to="2101012" data-speed="8000" data-refresh-interval="50">2,101,012</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-fashion">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-star"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Fashion</h2>
                                    <h3 data-from="0" data-to="1158245" data-speed="8000" data-refresh-interval="50">1,158,245</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--************************************
					Collection Count End
			*************************************-->
        <!--************************************
					Picked By Author Start
			*************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2>Một số cuốn sách hay</h2>

                        </div>
                    </div>
                    <div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
                        <?php
                        $sql = "SELECT * from sach  INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
								INNER JOIN theloai ON sach.tl_id = theloai.tl_id   limit 3";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <div class="item">
                                <div class="tg-postbook">
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                            <div class="tg-frontcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                                        </div>
                                        <div class="tg-hovercontent">
                                            <div class="tg-description">
                                                <p style="width: 517px;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 20px;
    -webkit-line-clamp: 5;
    display: -webkit-box;
    -webkit-box-orient: vertical;	"><?php echo $row['mota'] ?></p>

                                            </div>
                                            <strong class="tg-bookpage">Số trang:<?php echo $row['sotrang'] ?></strong>
                                            <strong class="tg-bookcategory">Tác giả:<?php echo $row['tl_ten'] ?></strong>
                                            <strong class="tg-bookprice">Giá: <?= number_format(($row['s_gia']) - (($row['s_gia']) * ($row['s_giamgia'])) / 100)  ?>₫</strong>
                                            <div class="tg-ratingbox"><span class="tg-stars"><span></span></span>
                                            </div>
                                        </div>
                                    </figure>
                                    <div class="tg-postbookcontent">
                                        <div class="tg-booktitle">
                                            <h3><a><?php echo $row['s_ten'] ?></a></h3>
                                        </div>
                                        <span class="tg-bookwriter">Tác giả: <a><?php echo $row['tg_ten'] ?></a></span>
                                        <a class="tg-btn tg-btnstyletwo" href="productdetail.php?id=<?php echo $row['s_id']; ?>">
                                            
                                            <em>Chi tiết</em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>


        <!--************************************
					Latest News End
			*************************************-->
        </main>
        <!--************************************
				Main End
		*************************************-->
        <!--************************************
				Footer Start
		*************************************-->
        <?php include "header/footer.php"; ?>
        <!--************************************
				Footer End
		*************************************-->
    </div>
    <!--************************************
			Wrapper End
	*************************************-->
    <script src="js/vendor/jquery-library.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.vide.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/countTo.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/gmap3.js"></script>
    <script src="js/main.js"></script>
    <script src="js/products.js"></script>
</body>

</html>