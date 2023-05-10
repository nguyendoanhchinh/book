function loadALL() {
    var action = "loadAll";
    var minimum_price = $("#hidden_minimum_price").val();
    var maximum_price = $("#hidden_maximum_price").val();
    $.ajax({
        method: "POST",
        url: "handle.php",
        data: {
            action: action,
            minimum_price: minimum_price,
            maximum_price: maximum_price
        },
        success: function(data) {
            $('#data_search').html(data);

        }
    });
}
$('#price_range').slider({
    range: true,
    min: 0,
    max: 1000000,
    values: [0, 2000000],
    step: 50000,
    stop: function(event, ui) {

        $('#price_show').html(ui.values[0] + ' đ' + ' - ' + ui.values[1] + ' đ');
        $('#hidden_minimum_price').val(ui.values[0]);
        $('#hidden_maximum_price').val(ui.values[1]);

        loadALL()
    }
});

$('#sapxep').change(function(e) {
    e.stopPropagation(); // Ngăn chặn sự kiện "change" lan ra các phần tử khác
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
        success: function(data) {
            $('#data_search').html(data);
        }
    });
})

$(document).on('click', '.page-item', function(e) {
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
            sapxep: sapxep
        },
        success: function(data) {
            $('#data_search').html(data);
        }
    });
});

// $(document).on('click', '#parent li', function(e) {
//     e.preventDefault();
//     $('#parent li').removeClass('active');
//     $(this).addClass('active');
//     var action = "theloai";
//     var id_category = $(this).attr('data-value');
//     var current_page = 1;
//     $.ajax({
//         type: "POST",
//         url: "handle.php",
//         data: { action: action, id_category: id_category, current_page: current_page },
//         success: function(data) {
//             $('#data_search').html(data);
//         }
//     });
// });

$(document).on('click', '#parent li', function(e) {
    e.preventDefault();
    $('#parent li').removeClass('active');
    $(this).addClass('active');
    var action = "theloai";
    var id_category = $(this).attr('data-value');
    var current_page = 1;
    if (window.location.pathname.endsWith('products.php')) {
        $.ajax({
            type: "POST",
            url: "handle.php",
            data: { action: action, id_category: id_category, current_page: current_page },
            success: function(data) {
                $('#data_search').html(data);
            }
        });
    } else {
        window.location.href = 'products.php';
    }
});
$(document).ready(function() {
    if (window.location.search) {
        var urlParams = new URLSearchParams(window.location.search);
        var id_category = urlParams.get('category');
        $('#parent li[data-value="' + id_category + '"]').trigger('click');
    }
});


$(document).on('submit', '#search_form', function(e) {
    e.preventDefault();
    var action = 'timkiem';
    var load = $('#inputsearch').val();
    if (load == '') {
        alert('Bạn chưa nhập thông tin');
    } else {
        $.ajax({
            url: 'handle.php',
            method: 'POST',
            data: {
                action: action,
                load: load
            },
            success: function(data) {
                // Lưu kết quả tìm kiếm vào lưu trữ phiên
                sessionStorage.setItem('searchResults', JSON.stringify(data));
                // Thiết lập cờ trạng thái để cho biết đã tìm kiếm
                sessionStorage.setItem('isSearched', true);
                // Chuyển hướng người dùng đến trang products.php
                window.location.href = 'products.php';

            }
        })
    }
});

$(document).ready(function() {
    // Kiểm tra xem đã tìm kiếm hay chưa
    var isSearched = sessionStorage.getItem('isSearched');
    if (isSearched) {
        // Lấy dữ liệu tìm kiếm từ lưu trữ phiên
        var searchResults = JSON.parse(sessionStorage.getItem('searchResults'));
        console.log(searchResults)
            // Hiển thị kết quả tìm kiếm trong phần tử HTML có id là data_search
        $('#data_search').html(searchResults);

        // ẩn pagination

        // Xóa dữ liệu tìm kiếm khỏi lưu trữ phiên và đặt lại cờ trạng thái
        sessionStorage.removeItem('searchResults');
        sessionStorage.removeItem('isSearched');
    } else {
        // Nếu chưa tìm kiếm thì hiển thị tất cả các sản phẩm bằng hàm loadALL()
        loadALL();
    }
});