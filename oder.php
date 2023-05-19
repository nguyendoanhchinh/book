<?php
session_start();
include "database/connect.php";
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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


<body>

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        <?php include "header/header.php"; ?>
<style>
            #info-cart-wp table tbody tr td .thumb {
                display: inline-block;
                width: 100px;
                height: 100px;
                overflow: hidden;

            }

            #info-cart-wp table tr td {
                display: table-cell;
                vertical-align: middle;
                text-align: center;

            }

            #info-cart-wp table tbody tr td {
                color: #444;
                /* padding: 15px 0px; */

            }

            #info-cart-wp table tr td {
                display: table-cell;
                vertical-align: middle;
                text-align: center;

            }

            #checkout-cart,
            #update-cart {
                display: inline-block;
                background: rgb(255, 66, 78);
                color: rgb(255, 255, 255);
                border: 1px solid #c5c5c5;
                padding: 10px 15px;
                margin-right: 5px;

                
                font-size: 20px;
                border-radius: 3px;
                padding: 10px 21px;
            }

            .header-cart-item {
                background-color: white;
                margin-bottom: 10px;

                border-radius: 8px;
                padding: 10px 0;
            }

            td {
                font-size: 19px;
            }

            a {
                color: rgb(36, 36, 36);
            }

            .nav-tabs {
                display: flex;
                justify-content: center;
                align-items: center;
                background: #fff;
            }


            .nav-tabs li.active a {
                color: red;
                /* Màu khi được nhấp vào */
            }

            .tab {
                font-size: 20px;
            }

            .tab:hover {
                color: orangered;
            }

            .content {
                margin: 0 50px;
            }

            table {
                border-collapse: collapse;
            }

            td,
            th {
                border-style: hidden !important;
            }

            .nav-tabs>li.active>a,
            .nav-tabs>li.active>a:focus,
            .nav-tabs>li.active>a:hover {
                color: orangered;

                cursor: default;
                background-color: #fff;
                border-bottom-color: red;

            }
</style>
        <main id="tg-main" class="tg-main tg-haslayout" style="padding-top:30px; background: #f5f5f5;">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs text-center ">
                                    <li class="active">
                                        <a href="#tab_getAll " class="tab" data-toggle="tab" style="margin-right: 92px;">
                                            Tất cả </a>
                                    </li>
                                    <li>
                                        <a href="#tab_choxacnhan  " class="tab tab_choxacnhan" data-toggle="tab" style="margin-right: 92px;">
                                            Chờ xác nhận </a>
                                    </li>
                                    <li>
                                        <a href="#tab_cholayhang " class="tab tab_cholayhang" data-toggle="tab" style="margin-right: 92px;">
                                            Chờ lấy hàng </a>
                                    </li>
                                    <li>
                                        <a href="#tab_danggiao " class="tab tab_danggiao" data-toggle="tab" style="margin-right: 92px;">
                                            Đang giao </a>
                                    </li>
                                    <li>
                                        <a href="#tab_dagiao " class="tab tab_dagiao" data-toggle="tab" style="margin-right: 92px;">
                                            Đã giao </a>
                                    </li>
                                    <li>
                                        <a href="#tab_dahuy " class="tab tab_dahuy" data-toggle="tab" style="margin-right: 92px;">
                                            Đã hủy </a>
                                    </li>
                                </ul>
                                <div class="tab-content" style="background: white;margin-top: 51px;">

                                <!-- hiển thị tất cả các đơn hàng -->
                                    <div class="tab-pane active" id="tab_getAll">

                                    </div>
                                    <div class="tab-pane" id="tab_choxacnhan">
                                        
                                    </div>
                                    <div class="tab-pane" id="tab_cholayhang">

                                    </div>
                                    <div class="tab-pane" id="tab_danggiao">

                                    </div>
                                    <div class="tab-pane" id="tab_dagiao">

                                    </div>
                                    <div class="tab-pane" id="tab_dahuy">

                                    </div>
                                    
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!--************************************
					News Grid End
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
    <script src="js/cart.js"></script>
    <script src="js/oder.js"></script>
    <script>

    </script>
</body>

</html>