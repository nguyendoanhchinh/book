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
    <title> Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="sb-nav-fixed">
    <?php
    include "inc/nav.php";
    ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "inc/sidebar.php"; ?>
        </div>
        <div id="layoutSidenav_content">
           
                <main>
                    <div class="container-fluid px-4">
                        <!-- thêm -->
                        <div class="modal fade" id="themcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm thể loại</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="t_category" class="form-label">thể loại</label>
                                                <input type="text" class=" form-control" id="t_category" name="t_category" aria-describedby="tacgia">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" id="addCategory">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  sửa -->
                        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa thể loại</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                        <div class="mb-3">
                                                <label for="s_idtheloai" class="form-label">Mã thể loại</label>
                                                <input type="text" class="form-control" id="s_idtheloai" name="s_idtheloai" aria-describedby="idtacgia" disabled>
                                                <input type="hidden" id="hidden_id">
                                            </div>
                                            <div class="mb-3">
                                                <label for="s_theloai" class="form-label">Tên thể loại</label>
                                                <input type="text" class="form-control" id="s_theloai" name="s_theloai" aria-describedby="tentacgia">
                                                <input type="hidden" id="hidden_id">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" id="btn_category">Sửa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-4">Quản lý Thể Loại</h1>
                        <ol class="breadcrumb mb-4">
                            <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#themcategory">
                                Thêm thể loại
                            </button>
                            <table class="table  mt-5">
                                <thead class="thead-dark">
                                    <tr >
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tên thể loại</th>
                                        <th class="text-center">Số lượng sách</th>
                                        <th class="text-center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody id="listCategory">
                                    
                                </tbody>
                            </table>
                        </ol>
                    </div>
                </main>
            </div>
        
    </div>
    <script src="js/category.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
   
    <script src="js/books.js"></script>
</body>

</html>