<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include "inc/nav.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "inc/sidebar.php";     ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Danh sách sách</h1>
                </div>
                <div class="card-body">
                    <div class="card mb-10">
                        <!-- tìm kiếm  -->
                        <div class="d-flex">
                            <form action="" method="POST" class="mr-2 col-sm-2 p-4 ">
                                <div class="dropdown">
                                    <div class="d-flex">
                                        <input class="form-control rounded" type="text" id="btnseach" data-bs-toggle="dropdown" aria-expanded="false" autocomplete="off">
                                        <input type="submit" class="btn btn-primary" id="search_btn" value="Tìm Kiếm">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="list_dropdown">
                                        </ul>
                                    </div>
                                </div>

                            </form>
                            <form action="" method="POST" class="mr-2 col-sm-2 p-4 ">
                                <select class="form-select " id="tim_theloai" aria-label="Default select example">
                                    <option selected>Tìm kiếm theo thể loại</option>
                                    <?php
                                    $sql = "select * from theloai ";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($query)) { ?>
                                        <option value="<?php echo $row['tl_id']; ?>"><?php echo $row['tl_ten'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </form>
                        </div>
                        <!-- Modal thêm  sách-->
                        <button type="submit" class="btn btn-success col-sm-1 pb-2 m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Thêm
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm sách</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="fupload" method="POST" enctype="multipart/form-data">

                                            <div class="mb-3">
                                                <label for="t_tensach" class="form-label">Tên sách</label>
                                                <input type="text" class="form-control" id="t_tensach">
                                            </div>
                                            <div class="d-flex">
                                                <div class="mb-3">
                                                    <label for="t_giasach" class="form-label">Gía sách</label>
                                                    <input type="number" class="form-control" id="t_giasach" name="t_giasach">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="t_sachgiamgia" class="form-label">Giảm Gía</label>
                                                    <input type="number" class="form-control" id="t_sachgiamgia" name="t_sachgiamgia">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="t_nxb" class="form-label">Nhà xuất bản</label>
                                                    <input type="text" class="form-control" id="t_nxb" name="t_nxb">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="t_namxuatban" class="form-label">Năm xuất bản</label>
                                                    <input type="number" class="form-control" id="t_namxuatban" name="t_namxuatban">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="t_mota" class="form-label">Mô tả</label>
                                                <input type="text" class="form-control" id="t_mota" name="t_mota">
                                            </div>

                                            <div class="d-flex">
                                                <div class="mb-3">
                                                    <label for="t_sotrang" class="form-label">Số trang</label>
                                                    <input type="number" class="form-control" id="t_sotrang" name="t_sotrang">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="t_soluong" class="form-label">Số lượng</label>
                                                    <input type="number" class="form-control" id="t_soluong" name="t_soluong">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="t_ngonngu" class="form-label">Ngôn ngữ</label>
                                                    <input type="text" class="form-control" id="t_ngonngu" name="t_ngonngu">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="t_tacgia" class="form-label">Tác giả</label>
                                                    <select class="form-select" id="t_tacgia" aria-label="Default select example">
                                                        <option selected>--Lựa chọn Tác giả--</option>
                                                        <?php
                                                        $sql = "select * from tacgia ";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($query)) { ?>
                                                            <option value="<?php echo $row['tg_id']; ?>"><?php echo $row['tg_ten'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="t_theloai" class="form-label">Thể loại</label>
                                                <select class="form-select" id="theloai_chinh" name="theloai_chinh">
                                                    <option selected>--Lựa chọn thể loại chính--</option>
                                                    <?php
                                                    $sql = "SELECT * FROM theloai";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $row['tl_id']; ?>"><?php echo $row['tl_ten']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                               
                                                <select class="form-select" id="cac_theloai_khac" name="cac_theloai_khac[]" multiple>
                                                    <option selected>--Lựa chọn các thể loại khác--</option>
                                                    <?php
                                                    $sql = "SELECT * FROM theloai";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $row['tl_id']; ?>"><?php echo $row['tl_ten']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>


                                            </div>
                                            <div class="mb-3">
                                                <label for="anhsach" class="form-label">Ảnh chính</label>
                                                <input type="file" class="form-control" name="anhsach" id="anhsach" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="anhsach" class="form-label">Ảnh phụ(nếu có)</label>
                                                <input type="file" class="form-control" name="anhsach1" id="anhsach1" aria-describedby="emailHelp">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" id="btnAdd">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal sửa sách -->
                        <div class="modal fade " id="displayModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Sửa sách</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3"><label for="tensach" class="form-label">Tên sách</label><input type="text" class="form-control" id="s_tensach" name="s_tensach"></div>
                                            <div class="d-flex">
                                                <div class="mb-3"><label for="giasach" class="form-label">Gía sách</label><input type="number" class="form-control" id="s_giasach" name="s_giasach"></div>
                                                <div class="mb-3"><label for="sachgiamgia" class="form-label">Giảm Gía</label><input type="number" class="form-control" id="s_sachgiamgia" name="s_sachgiamgia"></div>
                                                <div class="mb-3"><label for="nxb" class="form-label">Nhà xuất bản</label><input type="text" class="form-control" id="s_nxb" name="s_nxb"></div>
                                                <div class="mb-3"><label for="namxuatban" class="form-label">Năm xuất bản</label><input type="number" class="form-control" id="s_namxuatban" name="s_namxuatban"></div>
                                            </div>
                                            <input type="hidden" id="hidden_id" name="hidden_id"></input>
                                            <div class="d-flex">
                                                <div class="mb-3"><label for="sotrang" class="form-label">Số trang</label><input type="number" class="form-control" id="s_sotrang" name="s_sotrang"></div>
                                                <div class="mb-3"><label for="soluong" class="form-label">Số lượng</label><input type="number" class="form-control" id="s_soluong" name="s_soluong"></div>
                                                <div class="mb-3"><label for="ngonngu" class="form-label">Ngôn ngữ</label><input type="text" class="form-control" id="s_ngonngu" name="s_ngonngu"></div>

                                                <div class="mb-3">
                                                    <label for="s_tacgia" class="form-label">Tác giả</label>
                                                    <select id="s_tacgia" class="form-select" aria-label="Default select example">
                                                        <?php
                                                        $sql = "select * from tacgia";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($query)) {
                                                        ?>
                                                            <option value="<?php echo $row['tg_id']; ?>"><?php echo $row['tg_ten'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="s_theloai" class="form-label">Thể loại</label>
                                                <select id="s_theloai" class="form-select" aria-label="Default select example">
                                                    <?php
                                                    $sql = "select * from theloai";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                        <option disabled value="<?php echo $row['tl_id'] ?>"><?php echo $row['tl_ten'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" id="tbnSua">Sửa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden_id"></div>
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>Thông tin sách</th>
                                    <th>Gía sách</th>
                                    <th>Nhà xuất bản</th>
                                    <th>Năm xuất bản</th>
                                    <th>Giảm Gía</th>
                                    <th>Số trang</th>
                                    <th>Số lượng</th>
                                    <th>Ngôn ngữ</th>
                                    <th>Tên tác giả</th>
                                    <th>Tên thể loại</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-data">
                                <?php
                                //tìm tổng số bản ghi
                                $result = mysqli_query($conn, 'select count(s_id) as total from sach');
                                $row = mysqli_fetch_assoc($result);
                                $total = $row['total'];
                                //tìm giới hạn và trang đầu tiên
                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $limit = 8;
                                //tổng số trang làm  tròn lên
                                $total_page = ceil($total / $limit);
                                // Tìm trang đầu
                                $start = ($current_page - 1) * $limit;


                                $sql = "SELECT s.*, tg.tg_ten, GROUP_CONCAT(CASE WHEN st.tl_id IS NOT NULL THEN tl.tl_ten ELSE theloai.tl_ten END SEPARATOR ', ') AS tl_ten
                                FROM sach s
                                INNER JOIN tacgia tg ON tg.tg_id = s.tg_id
                                LEFT JOIN sach_theloai st ON st.s_id = s.s_id
                                LEFT JOIN theloai ON theloai.tl_id = s.tl_id
                                LEFT JOIN theloai tl ON tl.tl_id = st.tl_id
                                GROUP BY s.s_id
                                 limit  $start,$limit ";

                                $query = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="../images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="" style="width: 55px; height: 55px" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1"><?php echo $row['s_ten']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1"><?php echo number_format($row['s_gia']); ?></p>
                                        </td>
                                        <td><?php echo $row['nxb']; ?></td>
                                        <td><?php echo $row['namxuatban']; ?></td>
                                        <td><?php echo $row['s_giamgia']; ?></td>
                                        <td><?php echo $row['sotrang']; ?></td>
                                        <td><?php echo $row['soluong']; ?></td>
                                        <td><?php echo $row['ngonngu']; ?></td>
                                        <td><?php echo $row['tg_ten']; ?></td>
                                        <td>
                                            <select class="form-select" aria-label="Default select example">
                                                <?php
                                                $genres = explode(',', $row['tl_ten']);
                                                foreach ($genres as $genre) {
                                                    echo "<option>$genre</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" id_update="<?php echo $row['s_id']; ?>" s_ten="<?php echo $row['s_ten']; ?>" s_gia="<?php echo $row['s_gia']; ?>" s_giamgia="<?php echo $row['s_giamgia']; ?>" nxb="<?php echo $row['nxb']; ?>" namxuatban="<?php echo $row['namxuatban']; ?>" sotrang="<?php echo $row['sotrang']; ?>" soluong="<?php echo $row['soluong']; ?>" ngonngu="<?php echo $row['ngonngu']; ?>" id="display" tacgia="<?php echo $row['tg_id']; ?>" theloai="<?php echo $row['tl_id']; ?>" data-bs-toggle="modal" data-bs-target="#displayModal">
                                                Sửa
                                            </button>
                                            <button type="button" class="btn btn-danger" id="delete" id_delete="<?php echo $row['s_id']; ?>">
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>
                        </table>

                        <nav aria-label="Page navigation example " id="pagination_book">
                            <ul class="pagination justify-content-end">
                                <?php
                                $num_links = 1;
                                if ($current_page > 1 && $total_page > 1) { ?>
                                    <li class="page-item ">
                                        <a class="page-link" href="books.php?page=<?php echo $current_page - 1; ?>" tabindex="-1">Trang trước</a>
                                    </li>
                                <?php  }
                                if ($current_page > $num_links + 1) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="books.php?page=1">1</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                <?php }
                                ?>
                                <?php
                                for ($i = max(1, $current_page - $num_links); $i <= min($total_page, $current_page + $num_links); $i++) {
                                    if ($i == $current_page) { ?>
                                        <li class="page-item active">
                                            <span class="page-link"><?php echo $i; ?></span>
                                        </li>
                                    <?php } else { ?>
                                        <li class="page-item">
                                            <a class="page-link" href="books.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php }
                                }
                                if ($current_page < $total_page - $num_links) { ?>
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="books.php?page=<?php echo $total_page; ?>"><?php echo $total_page; ?></a>
                                    </li>
                                <?php }
                                ?>

                                <?php
                                if ($current_page < $total_page && $total_page > 1) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="books.php?page=<?php echo $current_page + 1; ?>">Trang sau</a>
                                    </li>
                                <?php }
                                ?>

                            </ul>
                        </nav>
                    </div>
                </div>
        </div>
        </main>

    </div>
    </div>


    <script src="js/books.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

</body>

</html>