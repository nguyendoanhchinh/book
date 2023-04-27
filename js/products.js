loadALL()

function loadALL() {
    var action = "loadAll";
    // var current_page = $(this).attr('page_pagination');
    $.ajax({
        method: "POST",
        url: "handle.php",
        data: {
            action: action,
            // current_page: current_page,
        },
        success: function (data) {
            $('#data_search').html(data);
        }
    });
}

// $(document).on('click', '.page-item', loadALL);


$('#sapxep').change(function (e) {
    e.preventDefault();
    var action = "sapxep";
    var sapxep = $(this).val();
    var id_category = $('#panigation_cate').attr('id_category');
    $.ajax({
        method: "POST",
        url: "handle.php",
        data: {
            action: action,
            sapxep: sapxep,
            id_category: id_category,
        },
        success: function (data) {
            $('#data_search').html(data);

        }
    });
})
$(document).on('click', '.page-item', function (e) {
    e.preventDefault();
    var action = $('#panigation_cate').attr('action');
    var id_category = $('#panigation_cate').attr('id_category');
    var sapxep = $('#panigation_cate').attr('sapxep');
    var current_page = $(this).attr('page_pagination');

    console.log(current_page)
    $.ajax({
        type: "POST",
        url: "handle.php",
        data: { 
            current_page: current_page, 
            action: action, 
            id_category: id_category,
            sapxep:sapxep
         },
        success: function (data) {
            $('#data_search').html(data);
        }
    });
});

$(document).on('click', '#parent li', function (e) {
    e.preventDefault();
    $('#parent li').removeClass('active');
    $(this).addClass('active');
    var action = "theloai";
    var id_category = $(this).attr('data-value');
    var current_page = 1;
    $.ajax({
        type: "POST",
        url: "handle.php",
        data: { action: action, id_category: id_category, current_page: current_page },
        success: function (data) {
            $('#data_search').html(data);
        }
    });
});
// $(document).ready(function() {
//     $(document).on('click', '#search_btn', function(e) {
//         e.preventDefault();
//         var action = 'timkiem';
//         var load = $('#inputsearch').val();

//         if (load == '') {
//             alert('Bạn chưa nhập thông tin');
//         } else {
//             $.ajax({
//                 url: 'handle.php',
//                 method: 'POST',
//                 data: {
//                     action: action,
//                     load: load
//                 },
//                 success: function(data) {
//                     // Lưu kết quả tìm kiếm vào lưu trữ phiên
//                     sessionStorage.setItem('searchResults', JSON.stringify(data));
//                     // //Hiển thị số lượng kết quả tìm kiếm
//                     // $('#count_product').text(data.count);
//                     // Chuyển hướng người dùng đến trang products.php
//                     window.location.href = 'products.php';
//                 }
//             })
//         }
//     })
// });
// $(document).ready(function() {
//     // Kiểm tra xem có dữ liệu tìm kiếm nào được lưu trong lưu trữ phiên không
//     if (sessionStorage.getItem('searchResults')) {
//         // Lấy dữ liệu tìm kiếm từ lưu trữ phiên
//         var searchResults = JSON.parse(sessionStorage.getItem('searchResults'));
//         // Hiển thị kết quả tìm kiếm trong phần tử HTML có id là data_search
//         $('#data_search').html(searchResults);

//         //ẩn pagination
//         $('#pagination_book').hide();
//         // Xóa dữ liệu tìm kiếm khỏi lưu trữ phiên
//         sessionStorage.removeItem('searchResults');
//     }
// });
// // hiển thị dữ liệu thẻ loại
// $('#detail_product').on('click', 'li', function(e) {
//     e.preventDefault();
//     var id = $(this).attr('data-value');
//     // Chuyển hướng người dùng đến trang products.php với tham số truy vấn activeLi bằng với giá trị của thuộc tính data-value
//     window.location.href = 'products.php?activeLi=' + id;

// });


// $(document).ready(function() {
//     // Lấy giá trị của tham số truy vấn activeLi từ URL
//     var urlParams = new URLSearchParams(window.location.search);
//     var activeLiValue = urlParams.get('activeLi');
//     // Nếu có giá trị này
//     if (activeLiValue) {
//         // Thêm lớp active vào thẻ li có thuộc tính data-value bằng với giá trị này
//         $('#detail_product li[data-value="' + activeLiValue + '"]').addClass('active');
//         // Gửi yêu cầu AJAX đến handle.php
//         $.ajax({
//             type: "POST",
//             url: "handle.php",
//             data: { action: 'chitiettheloai', id: activeLiValue },
//             success: function(data) {
//                 // Cập nhật nội dung của phần tử HTML có id là data_search
//                 $('#data_search').html(data);
//                 $('#pagination_book').hide();
//             }

//         });
//     }

// });

// //sắp xếp  theo các chường hợp
// $(document).ready(function() {
//     function loadData() {
//         var action = "getData";
//         $.ajax({
//             type: "POST",
//             url: "handle.php",
//             data: { action: action },
//             success: function(data) {
//                 $('#data_search').html(data);

//             }
//         });
//     }