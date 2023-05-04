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
							<h1>Tất Cả Sách</h1>
							<ol class="tg-breadcrumb">
								<li><a href="#">Trang chủ</a></li>
								<li class="tg-active">Sách</li>
							</ol>
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
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					News Grid Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">
									<div class="tg-products">
										<div class="tg-sectionhead">
											<h2>Sách bán chạy</h2>
										</div>
										<div class="tg-featurebook alert" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<?php
											include "database/connect.php";
											$sql = "SELECT * from  sach INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
											INNER JOIN theloai ON sach.tl_id = theloai.tl_id  ORDER BY luotmua DESC LIMIT 1";

											$query = mysqli_query($conn, $sql);
											while ($row = mysqli_fetch_assoc($query)) { ?>
												<div class="tg-featureditm">
													<div class="row">
														<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
															<figure><img style="width: 241px;height: 298px;" src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></figure>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
															<div class="tg-featureditmcontent">
																<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
																<div class="tg-booktitle">
																	<h3><a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['s_ten']  ?></a></h3>
																</div>
																<span class="tg-bookwriter">Tác giả: <a href="#"><?php echo $row['tg_ten']  ?></a></span>
																<span class="tg-stars"><span></span></span>
																<div class="tg-priceandbtn">
																	<span class="tg-bookprice">
																		<ins><?php echo number_format($row['s_gia']);  ?>vnđ</ins>
																		<del><?php echo number_format($row['s_giamgia']);  ?>%</del>
																	</span>
																	<a class="tg-btn tg-btnstyletwo tg-active" href="#">
																		<i class="fa fa-shopping-basket"></i>
																		<em>Thêm giỏ hàng</em>
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											<?php }
											?>

										</div>


										<select style="margin-left: 90%;" class="form-select" aria-label="Default select example" id="sapxep">
											<option value="rand()">Sắp xếp theo</option>
											<option value="luotmua DESC">Mua nhiều nhất</option>
											<option value="namxuatban DESC">Sách mới nhất</option>
											<option value="s_gia ASC">Giá tăng dần</option>
											<option value="s_gia DESC">Giá giảm dần</option>
										</select>


										<div class="tg-productgrid" id="data_search">


										</div>

									</div>
								</div>

							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetsearch">
										<style>
											#paran li.active {
												font-weight: bold;
												background-color: #0507041a;
											}
										</style>
									</div>
									<div class="tg-widget tg-widgetblogers">
										<div class="tg-widgettitle">
											<h3>Giá tiền</h3>
										</div>
										
											<div class="list-group">
												<input type="hidden" id="hidden_minimum_price" value="0" />
												<input type="hidden" id="hidden_maximum_price" value="2000000" />
												<p id="price_show">0đ - 1,000,000đ </p>
												<div id="price_range"></div>
											</div>
									 


									</div>
									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Thể loại</h3>
										</div>
										<?php include "header/category.php" ?>
									</div>
									<div class="tg-widget tg-widgettrending">
										<div class="tg-widgettitle">
											<h3>Được xem nhiều nhất</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<?php
												$sql = "SELECT *
												FROM sach
												JOIN tacgia
												ON sach.tg_id = tacgia.tg_id order by rand() limit 11";
												$query = mysqli_query($conn, $sql);
												while ($row = mysqli_fetch_assoc($query)) { ?>
													<li>
														<article class="tg-post">
															<figure><a href="productdetail.php?id=<?php echo $row['s_id']; ?>" style="width: 95px;height: 95px;"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></a></figure>
															<div class="tg-postcontent">
																<div class="tg-posttitle">
																	<h3><a hrehref="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['s_ten']; ?></a></h3>
																</div>
																<span class="tg-bookwriter">Bởi: <a href="#"><?php echo $row['tg_ten'] ?></a></span>
															</div>
														</article>
													</li>
												<?php }
												?>

											</ul>
										</div>
									</div>

									
								</aside>
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
</body>

</html>