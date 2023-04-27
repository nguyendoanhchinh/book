<?php
session_start();
include "database/connect.php";
if (!isset($_GET['id'])) {
	header('Location: index.php');
	exit;
}
if (!isset($_GET['productdetail'])) {
	$id = $_GET['id'];
	$sql = "SELECT * from sach inner join tacgia on sach.tg_id=tacgia.tg_id INNER JOIN  theloai on theloai.tl_id=sach.tl_id  where s_id =$id ";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
}


?>
<!doctype html>
<html class="no-js" lang="zxx">

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
							<h1>Thông tin chi tiết</h1>
							<ol class="tg-breadcrumb">
								<li><a href="index.php">Trang chủ</a></li>
								<li><a href="products.php">Sản phẩm</a></li>

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
									<div class="tg-featurebook alert" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<?php
										$sql = "SELECT *FROM sach JOIN tacgia
												ON sach.tg_id = tacgia.tg_id order by rand() limit 1";

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
									<div class="tg-productdetail">
										<div class="row">
											<?php
											if (!isset($_GET['productdetail'])) {
												$id = $_GET['id'];
												$sql = "SELECT * from sach inner join tacgia on sach.tg_id=tacgia.tg_id INNER JOIN  theloai on theloai.tl_id=sach.tl_id  where s_id =$id ";
												$query = mysqli_query($conn, $sql);
												$row = mysqli_fetch_array($query);
											}
											?>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
												<div class="tg-postbook">
													<div class="tg-frontcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
													<div class="tg-postbookcontent">
														<span class="tg-bookprice">
															<ins><?php echo number_format($row['s_gia']);  ?>vnđ</ins>
															<del><?php echo number_format($row['s_giamgia']);  ?>%</del>
														</span>
														<span class="tg-bookwriter">Giảm được : <?= number_format(($row['s_gia']) * ($row['s_giamgia']) / 100)	 ?> vnđ</span>
														<ul class="tg-delevrystock">
															<li><i class="icon-rocket"></i><span>Miễn Phí Vận Chuyển</span></li>

															<li><i class="icon-store"></i><span>Trạng thái: <em>
																		<?php if ($row['soluong'] > 0) {
																			echo "Còn";
																		} else {
																			echo "Hết";
																		} ?></em></span></li>
														</ul>
														<div class="tg-quantityholder">
															<em class="minus">-</em>
															<input type="text" class="result" value="0" id="quantity1" name="quantity">
															<em class="plus">+</em>
														</div>
														<a class="tg-btn tg-active tg-btn-lg" href="#">Thêm giỏ hàng</a>

													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
												<div class="tg-productcontent">
													<ul class="tg-bookscategories">
														<li><a href="#"><?php echo $row['tl_ten']; ?></a></li>
													</ul>
													<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
													<div class="tg-booktitle">
														<h3><?php echo $row['s_ten'] ?></h3>
													</div>
													<span class="tg-bookwriter">Tác giả: <a href="#"><?php echo $row['tg_ten']; ?></a></span>
													<span class="tg-stars"><span></span></span>

													<div class="tg-share">
														<span>Chia sẻ:</span>
														<ul class="tg-socialicons">
															<li class="tg-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
															<li class="tg-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
															<li class="tg-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
															<li class="tg-googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
															<li class="tg-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
														</ul>
													</div>
													<div class="tg-description">
														<p style="width: 517px;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 20px;
    -webkit-line-clamp: 5;
    display: -webkit-box;
    -webkit-box-orient: vertical;	"><?php echo $row['mota'] ?></p>

													</div>
													<div class="tg-sectionhead">
														<h2>Thông tin chi tiết</h2>
													</div>
													<ul class="tg-productinfo">
														<li><span>Lượt mua:</span><span><?= $row['luotmua']; ?></span></li>
														<li><span>Số Trang:</span><span><?php echo $row['sotrang']; ?></span></li>
														<li><span>Nhà xuất bản:</span><span><?php echo $row['nxb']; ?></span></li>
														<li><span> Năm xuất bản:</span><span><?php echo $row['namxuatban']; ?></span></li>
														<li><span>Tác giả:</span><span><?php echo $row['tg_ten']; ?></span></li>
														<li><span>Ngôn ngữ:</span><span><?= $row['ngonngu']; ?></span></li>
													</ul>
												</div>
											</div>
											<div class="tg-productdescription">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div class="tg-sectionhead">
														<h2>Lợi ích đọc sách</h2>
													</div>
													<ul class="tg-themetabs" role="tablist">
														<li role="presentation" class="active"><a href="#description" data-toggle="tab">Lợi ích</a></li>

													</ul>
													<div class="tg-tab-content tab-content">
														<div role="tabpanel" class="tg-tab-pane tab-pane active" id="description">
															<div class="tg-description">
																<p>Đọc sách mang đến nhiều lợi ích bất ngờ mà bạn không hề biết đến. Đọc sách đúng cách giúp kích thích não bộ phát triển tốt hơn, hạn chế lão hóa và giảm khả năng mất trí nhớ. Ngoài ra, đọc sách cũng giúp con người ta nâng cao hiểu biết, làm giàu vốn từ, tăng khả năng tư duy, nhìn nhận vấn đề…</p>
																<figure class="tg-alignleft">
																	<img src="images/placeholdervtwo.jpg" alt="image description">
																	<iframe width="560" height="315" src="https://www.youtube.com/embed/TnWwDYbgweg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
																</figure>
																<ul class="tg-liststyle">
																	<li><span>Đọc sách giúp nâng cao hiểu biết</span></li>
																	<li><span>Tăng cường kỹ năng tư duy, phân tích, tập trung</span></li>
																	<li><span>Đọc sách giúp mở rộng vốn từ</span></li>
																	<li><span>Đọc sách giúp rèn luyện trí nhớ</span></li>
																	<li><span>Đọc sách giúp giảm căng thẳng</span></li>
																	<li><span>Đọc sách giúp kéo dài tuổi thọ</span></li>
																	<li><span>Cải thiện khả năng viết lách</span></li>
																</ul>
																<p>Một trong những lợi ích của đọc sách khác là giúp người đọc xây dựng một lối sống lành mạnh. Bạn sẽ ít bị ảnh hưởng bởi các trò tiêu khiển độc hại, hạn chế tiếp xúc với các thiết bị điện tử như máy tính, điện thoại. Nhờ đọc sách bạn sẽ rèn được thói quen đi ngủ sớm, dậy sớm, tỉnh táo và sắp xếp thời gian biểu hợp lý hơn..</p>
															</div>
														</div>

													</div>
												</div>
											</div>

											<div class="tg-relatedproducts">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div class="tg-sectionhead">
														<h2>Sản phẩm tương tự</h2>

													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div id="tg-relatedproductslider" class="tg-relatedproductslider tg-relatedbooks owl-carousel">
														<?php
														$sql = "SELECT * from sach  INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
													INNER JOIN theloai ON sach.tl_id = theloai.tl_id   order by rand() ";
														$query = mysqli_query($conn, $sql);
														while ($row = mysqli_fetch_assoc($query)) { ?>

															<div class="item">
																<div class="tg-postbook">
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
																			<li><a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['tl_ten']; ?></a></li>
																		</ul>
																		<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
																		<div class="tg-booktitle" style="height:70px;">
																			<h3><a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['s_ten']; ?></a></h3>
																		</div>
																		<span class="tg-bookwriter" style="margin-top: 38px;">Tác giả: <a href="#"><?php echo $row['tg_ten']; ?></a></span>
																		<span class="tg-stars"><span></span></span>
																		<span class="tg-bookprice">
																			<ins><?php echo number_format($row['s_gia']);  ?>vnđ</ins>
																			<del><?php echo number_format($row['s_giamgia']);  ?>%</del>
																		</span>
																		<a class="tg-btn tg-btnstyletwo" href="#">
																			<i class="fa fa-shopping-basket"></i>
																			<em>Thêm giỏ hàng</em>
																		</a>
																	</div>
																</div>
															</div>

														<?php }
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									
									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Thể loại</h3>
										</div>
										<div class="tg-widgetcontent"  id="detail_product">
											
											<?php
											include "database/connect.php";
											$sql = "SELECT theloai.tl_id, theloai.tl_ten, COUNT(sach.tl_id) as tongsosach 
											FROM theloai 
											LEFT JOIN sach ON sach.tl_id = theloai.tl_id 
											GROUP BY theloai.tl_id, theloai.tl_ten";
											$query = mysqli_query($conn, $sql);
											while ($row = mysqli_fetch_assoc($query)) { ?>
												<ul>
													<li data-value="<?php echo $row['tl_id'] ?>"><a href="#"><span><?php echo $row['tl_ten'] ?></span><em><?php echo $row['tongsosach'] ?></em></a></li>
												</ul>
											<?php }
											?>
										</div>
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
												ON sach.tg_id = tacgia.tg_id order by rand() limit 8";
												$query = mysqli_query($conn, $sql);
												while ($row = mysqli_fetch_assoc($query)) { ?>
													<li>
														<article class="tg-post">
															<figure><a href="#" style="width: 95px;height: 95px;"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></a></figure>
															<div class="tg-postcontent">
																<div class="tg-posttitle">
																	<h3><a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['s_ten']; ?></a></h3>
																</div>
																<span class="tg-bookwriter">Bởi: <a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['tg_ten'] ?></a></span>
															</div>
														</article>
													</li>
												<?php }
												?>

											</ul>
										</div>
									</div>
									<div class="tg-widget tg-widgetblogers">
										<div class="tg-widgettitle">
											<h3>Tác giả nổi tiếng </h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li>
													<div class="tg-author">
														<figure><a href="#"><img src="images/author/imag-03.jpg" alt="image description"></a></figure>
														<div class="tg-authorcontent">
															<h2><a href="#">Jude Morphew</a></h2>
															<span>21,658 Published Books</span>
														</div>
													</div>
												</li>
												<li>
													<div class="tg-author">
														<figure><a href="#"><img src="images/author/imag-04.jpg" alt="image description"></a></figure>
														<div class="tg-authorcontent">
															<h2><a href="#">Jude Morphew</a></h2>
															<span>21,658 Published Books</span>
														</div>
													</div>
												</li>
												<li>
													<div class="tg-author">
														<figure><a href="#"><img src="images/author/imag-05.jpg" alt="image description"></a></figure>
														<div class="tg-authorcontent">
															<h2><a href="#">Jude Morphew</a></h2>
															<span>21,658 Published Books</span>
														</div>
													</div>
												</li>
												<li>
													<div class="tg-author">
														<figure><a href="#"><img src="images/author/imag-06.jpg" alt="image description"></a></figure>
														<div class="tg-authorcontent">
															<h2><a href="#">Jude Morphew</a></h2>
															<span>21,658 Published Books</span>
														</div>
													</div>
												</li>
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