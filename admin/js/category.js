loadCategory()

function loadCategory() {

    var action = 'loadCategory';
    $.ajax({
        type: 'POST',
        url: "bookmodel.php",
        data: { action: action },
        success: function(data) {
            $('#listCategory').html(data);

        }
    });
}

//thêm thể loại
$(document).on('click', '#addCategory', function() {
    var action = 'addCategory';
    var themtheloai = $('#t_category').val();
    $.ajax({
        method: "POST",
        url: "bookmodel.php",
        data: { action: action, themtheloai: themtheloai },

        success: function(data) {
            loadCategory()
            alert(data);
            location.reload()
            $("#themcategory").modal('hide');
        }
    });
})

//hiển thị thông tin chi tiet the loai 

$(document).on('click', '#btnsuacategory', function() {
        var id_theloai = $(this).attr('id_theloai');
        var ten_theloai = $(this).attr('ten_theloai');

        $('#suaModal').modal('show')
        $('#s_idtheloai').val(id_theloai);
        $('#s_theloai').val(ten_theloai);
    })
    //sua thong tin the loai
$(document).ready(function() {
        $(document).on('click', '#btn_category', function() {

            var action = 'updatecategory';
            var id = $('#s_idtheloai').val();
            var tentheloai = $('#s_theloai').val();
            $.ajax({
                type: "POST",
                url: "bookmodel.php",
                data: { action: action, tentheloai: tentheloai, id: id },
                success: function(data) {
                    alert(data);
                    loadCategory();
                    location.reload()
                    $('#categoryModal').modal('hide');
                }
            });
        })
    })
    //xóa thông tin thể loại

$(document).on('click', '#deletecategory', function() {
    var id = $(this).attr('id_deletecategory');
    var action = 'deleteCategory';
    $.ajax({
        url: 'bookmodel.php',
        method: 'POST',
        data: {
            id: id,
            action: action,
        },
        success: function(data) {
            location.reload()
            loadCategory()
            alert(data)


        }
    })
});