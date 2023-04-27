//hien thi thong thong tin tac gia
loadAuthor();

function loadAuthor() {

    var action = 'loadAuthor';
    $.ajax({
        type: 'POST',
        url: "bookmodel.php",
        data: { action: action },
        success: function(data) {
            $('#listAuthor').html(data);

        }
    });
}
//hiển thị thông tin chi tiet tacgia 

$(document).on('click', '#tbnSuaauthor', function() {
        var id_tacgia = $(this).attr('id_tacgia');
        var ten_tacgia = $(this).attr('ten_tacgia');

        $('#suaModal').modal('show')
        $('#idtacgia').val(id_tacgia);
        $('#tentacgia').val(ten_tacgia);
    })
    //sua thong tin tac gia
$(document).ready(function() {
        $(document).on('click', '#btnUpdateAuthor', function() {

            var action = 'updateAuthor';
            var id = $('#idtacgia').val();
            var tentacgia = $('#tentacgia').val();
            $.ajax({
                type: "POST",
                url: "bookmodel.php",
                data: { action: action, tentacgia: tentacgia, id: id },
                success: function(data) {
                    alert(data);
                    loadAuthor();
                    location.reload()
                    $('#modalAuthor').modal('hide');
                }
            });
        })
    })
    //xóa thông tin tác giẳ
$(document).on('click', '#deleteAuthor', function() {
    var id = $(this).attr('id_deleteAuthor');
    var action = 'deleteAuthor';
    $.ajax({
        url: 'bookmodel.php',
        method: 'POST',
        data: {
            id: id,
            action: action,
        },
        success: function(data) {
            location.reload()
            loadAuthor()
            alert(data)
        }
    })
});

//thêm tác giả 

$(document).on('click', '#addAuthoradmin', function() {
    var action = 'addAuthor';
    var addauthor = $('#inputaddauthor').val();
    $.ajax({
        method: "POST",
        url: "bookmodel.php",
        data: { action: action, addauthor: addauthor },

        success: function(data) {
            loadAuthor()
            location.reload();
            alert(data);
            $("#themauthor").modal('hide');
        }
    });
})