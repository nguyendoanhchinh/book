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

        border-radius: 3px;
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

    a {
        color: rgb(36, 36, 36);
    }
</style>

<body>

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        <?php include "header/header.php"; ?>
        <!--************************************
				Header End
		*************************************-->
        <!--************************************
				Inner Banner Start
		*************************************-->
        <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-innerbannercontent">
                            <h1>Thanh toán </h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
				Inner Banner End
		*************************************-->
        <!--************************************
				Main Start
		*************************************-->
        <style>
            table {
                border-collapse: collapse;
            }

            td,
            th {
                border-style: hidden !important;
            }
        </style>
        <main id="tg-main" class="tg-main tg-haslayout" style="margin-top:30px;">
            <div class="container">
                <div id="main-content-wp" class="cart-page">
                    <div class="section" id="breadcrumb-wp" style="border-top: 2px solid;">
                        <!-- <?php
                                $k_id = $_SESSION['k_id'];
                                $sql = "SELECT *
                        FROM khach
                         where k_id=$k_id;
                        ";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($query)

                                ?> -->
                        <div class="info" style="margin-left:2%;">
                            <h3 style="color: coral;"><i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ nhận hàng</h3>
                            <p style="font-weight: 700;color: #222;font-size: 2rem;"><?php echo ($_SESSION['k_email']) ?>(+84) <?= ltrim($row['k_sdt'], 0) ?></p>
                            <p style="font-weight: 900;"><?= $row['k_diachi'] ?></p>
                        </div>
                    </div>
                    <div id="wrapper" class="wp-inner clearfix ">
                        <div class="section" id="info-cart-wp">
                            <div class="section-detail table-responsive" style="border-top: 2px solid;">

                                <table class="table" border="0" cellpadding="0" cellspacing="0">
                                    <div class="header-cart-item">
                                        <h3>Sản phẩm</h3>
                                        <div style="color: black;">
                                            <span style="font-size:20px;margin-left: 689px; ">Đơn Giá</span>
                                            <span style="font-size:20px;margin-left: 53px; ">Số lượng</span>
                                            <span style="font-size:20px;margin-left: 56px; ">Thành tiền</span>
                                        </div>
                                        <tbody id="cart-items">
                                            <?php
                                            $selectedProducts = [];

                                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectedProducts"])) {
                                                $selectedProducts = json_decode($_POST["selectedProducts"], true);
                                                $_SESSION["selectedProducts"] = $selectedProducts;
                                            } elseif (isset($_SESSION["selectedProducts"])) {
                                                $selectedProducts = $_SESSION["selectedProducts"];
                                            }

                                            $totalPrice = 0;

                                            if (!empty($selectedProducts)) {
                                                foreach ($selectedProducts as $product) {
                                                    $id_product = $product["id_product"];
                                                    $price_product = $product["price_product"];
                                                    $quantity = $product["quantity"];

                                                    // Retrieve product information from the database based on $id_product
                                                    // Modify the query according to your database structure
                                                    $sql = "SELECT * FROM giohang INNER JOIN sach ON giohang.s_id = sach.s_id WHERE giohang.s_id = $id_product";
                                                    $query = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_assoc($query);

                                                    // Check if $row is not null before accessing its elements
                                                    if ($row) {
                                            ?>

                                                        <tr>
                                                            <td>
                                                                <a href="#" title="" class="thumb">
                                                                    <img src="images/Image/VanHoc/<?= $row['anh'] ?>" alt="">
                                                                </a>
                                                            </td>
                                                            <td style="width: 26%; box-sizing: border-box;">
                                                                <a style="word-wrap: break-word;" href="productdetail.php?id=<?= $row['s_id']; ?>" title="" class="name-product">
                                                                    <?= $row['s_ten'] ?>
                                                                </a>
                                                            </td>
                                                            <td><?= number_format(($row['s_gia']) - (($row['s_gia']) * ($row['s_giamgia'])) / 100); ?>đ</td>
                                                            <td>
                                                                <div class="tg-quantityholder" style="margin-left: 25%; width: 50%;float: left;">
                                                                    <a id="text" type="text" name="num-order" value="" class="num-order"><?= number_format($quantity); ?></a>
                                                                </div>
                                                            </td>
                                                            <td class="loadproduct" data-id="<?= $row['s_id'] ?>"><?= number_format($row['tongtien']); ?>đ</td>
                                                        </tr>
                                                <?php
                                                        $productTotal = $price_product * $quantity;
                                                        $totalPrice += $productTotal;
                                                    }
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="5">Không có sản phẩm nào</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>




                                    </div>
                                </table>

                                <div style="padding:20px 0px;">
                                    <div style="padding:20px 0px; position: absolute;"> Lời nhắn : <input type="text"></div>
                                    <div class="clearfix " style="color: black; margin-left:86%;">
                                        <p class="fl-left">Tổng tiền: <span id="total-price" style="color: red;font-size: 20px;"></span><?php if (isset($_POST["selectedProducts"])) {
                                                                                                                                            echo number_format($totalPrice);
                                                                                                                                        } else {
                                                                                                                                            echo number_format($totalPrice);
                                                                                                                                        }  ?> đ</p>
                                    </div>
                                    <div class="clearfix" style="margin-left:86%;">
                                        <div class="fl-right">
                                            <a href="#" title="" id="checkout-cart">Đặt hàng</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal thông báo-->
                                <!-- <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="margin-top: 50%;">
                                            <div class="modal-body">
                                            </div>
                                        </div>

                                    </div>
                                </div> -->

                                <!-- <div style="" class="modal fade" id="modal-notify" tabindex="-1" role="dialog" aria-labelledby="confirm-delete-modal-label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            
                                            <div class="modal-body" style="font-size: 20px; font-size: 15px; align-items: center;text-align: center;background: rgba(0,0,0,0.8);color: white;">
                                            Vui lòng chọn sản phẩm để xóa .
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> -->
                                <!-- modal xóa -->
                                <!-- <div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="confirm-delete-modal-label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirm-delete-modal-label"> <i class="fa fa-exclamation-triangle" style="color:rgb(252, 130, 10);"> </i> Xóa sản phẩm</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="font-size: 20px;">
                                                Bạn có muốn xóa sản phẩm đang chọn không ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                <button type="button" class="btn btn-danger" id="confirm-delete-btn">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

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
    <script>

    </script>
</body>

</html>