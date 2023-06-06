// thêm
$(document).on('click', '#btnAdd', function(e) {
    e.preventDefault();
    var action = "themsach";
    var tensach = $("#t_tensach").val();
    var giasach = $("#t_giasach").val();
    var sachgiamgia = $("#t_sachgiamgia").val();
    var nxb = $("#t_nxb").val();
    var namxuatban = $("#t_namxuatban").val();
    var mota = $("#t_mota").val();
    var sotrang = $("#t_sotrang").val();
    var soluong = $("#t_soluong").val();
    var ngonngu = $("#t_ngonngu").val();
    var tacgia = $("#t_tacgia").val();
    var theloaiChinh = $("#theloai_chinh").val();
    var cacTheloaiKhac = $("#cac_theloai_khac").val();

    var formData = new FormData();
    formData.append('action', action);
    formData.append('tensach', tensach);
    formData.append('giasach', giasach);
    formData.append('sachgiamgia', sachgiamgia);
    formData.append('nxb', nxb);
    formData.append('namxuatban', namxuatban);
    formData.append('mota', mota);
    formData.append('sotrang', sotrang);
    formData.append('soluong', soluong);
    formData.append('ngonngu', ngonngu);
    formData.append('tacgia', tacgia);
    formData.append('theloaiChinh', theloaiChinh);
    $.each(cacTheloaiKhac, function(index, value) {
        formData.append('cacTheloaiKhac[]', value);
    });
    formData.append('anhsach', $('#anhsach')[0].files[0]);
    formData.append('anhsach1', $('#anhsach1')[0].files[0]);

    $.ajax({
        url: "bookmodel.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            console.log(data);
            location.reload();
            $('#exampleModal').modal('hide');
        }
    });
});


//tìm kiếm theo thể loại


$('#tim_theloai').change(function() {
    var id = $("#tim_theloai").val();
    var action = 'searchbycategory';
    $.ajax({
        url: "bookmodel.php",
        type: "POST",
        data: { id: id, action: action },
        success: function(data) {

            $(".table-data").html(data);
            $('#pagination_book').hide()
        }
    })
})



//hiển thị dữ liệu sửa
$(document).on('click', '#display', function() {
        var id = $(this).attr('id_update');
        var s_ten = $(this).attr('s_ten');
        var s_gia = $(this).attr('s_gia');
        var s_giamgia = $(this).attr('s_giamgia');
        var nxb = $(this).attr('nxb');
        var namxuatban = $(this).attr('namxuatban');
        var sotrang = $(this).attr('sotrang');
        var soluong = $(this).attr('soluong');
        var ngonngu = $(this).attr('ngonngu');
        var tacgia = $(this).attr('tacgia');
        var theloai = $(this).attr('theloai');

        $('#displayModal').modal('show');
        $('#hidden_id').val(id);
        $('#s_tensach').val(s_ten)
        $('#s_giasach').val(s_gia)
        $('#s_sachgiamgia').val(s_giamgia)
        $('#s_nxb').val(nxb)
        $('#s_namxuatban').val(namxuatban)
        $('#s_sotrang').val(sotrang)
        $('#s_soluong').val(soluong)
        $('#s_ngonngu').val(ngonngu)
        $('#s_tacgia').val(tacgia)
        $('#s_theloai').val(theloai)

    })
    //sủa dữ liệu
$(document).on('click', '#tbnSua', function() {
    var action = 'updateBook';
    var s_tensach = $('#s_tensach').val();
    var s_giasach = $('#s_giasach').val();
    var s_sachgiamgia = $('#s_sachgiamgia').val();
    var s_nxb = $('#s_nxb').val();
    var s_namxuatban = $('#s_namxuatban').val();
    var s_sotrang = $('#s_sotrang').val();
    var s_soluong = $('#s_soluong').val();
    var s_ngonngu = $('#s_ngonngu').val();

    var s_tacgia = $('#s_tacgia').val();
    var s_theloai = $('#s_theloai').val();

    var id = $('#hidden_id').val();
    $.ajax({
        type: "POST",
        url: "bookmodel.php",
        data: {
            action: action,
            id: id,
            s_tensach: s_tensach,
            s_giasach: s_giasach,
            s_sachgiamgia: s_sachgiamgia,
            s_nxb: s_nxb,
            s_namxuatban: s_namxuatban,
            s_sotrang: s_sotrang,
            s_soluong: s_soluong,
            s_ngonngu: s_ngonngu,
            s_tacgia: s_tacgia,
            s_theloai: s_theloai
        },

        success: function(data) {
            console.log(data);
            location.reload();
            $('#displayModal').modal('hide');

        }
    });
})



//xóa dữ liệu sách
$(document).on('click', '#delete', function() {
    var id = $(this).attr('id_delete');

    var action = 'deleteBook';
    $.ajax({
        url: 'bookmodel.php',
        method: 'POST',
        data: {
            id: id,
            action: action,
        },
        success: function(data) {
            alert(data);
            location.reload();
        }
    })
});
//tìm kiếm
$(document).ready(function() {
    $("#btnseach").keyup(function() {
        var action = 'search';
        var s_ten = $(this).val();

        if (s_ten != '') {
            $.ajax({
                url: 'bookmodel.php',
                method: 'POST',
                data: {
                    action: action,
                    s_ten: s_ten
                },
                success: function(data) {

                    $('#list_dropdown').fadeIn('fast').html(data);
                }
            });
        } else {
            $('#list_dropdown').fadeOut();
        }
    });
});
//hiển thị sản phẩm tìm kiếm 
$(document).on('click', '#search_btn', function(e) {
        e.preventDefault();
        var action = 'loadData';
        var load = $('#btnseach').val();

        if (load == '') {
            alert('bạn chưa nhập thông tin');
        } else {
            $.ajax({
                url: 'bookmodel.php',
                method: 'POST',
                data: {
                    action: action,
                    load: load
                },
                success: function(data) {
                    $('.table-data').html(data)
                    $('#pagination_book').hide()
                    $('#list_dropdown').hide()

                }
            })
        }

    })
    //hiển thị 1 sản phẩm
$(document).on('click', '#list_search', function() {
    var id = $(this).attr('value');
    console.log(id)
    var action = 'list_book';
    var load = $('#btnseach').val();
    $.ajax({
        type: "POST",
        url: "bookmodel.php",
        data: { id: id, action: action, load: load },

        success: function(data) {

            $('#pagination_book').hide()
            $('.dropdown-item').hide()
            $('.table-data').html(data)
        }
    });
})