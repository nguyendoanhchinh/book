// nếu trạng thái bằng 0 : chờ xác nhận
// nếu trạng thái bằng 1 : chờ lấy hàng
// nếu trạng thái bằng 2 : đang giao
// nếu trạng thái bằng 3 : đã giao
// nếu trạng thái bằng 4 : đã hủy
$(document).ready(function() {
    $(document).on('click', '#xacnhandon', function(e) {
        e.preventDefault();
        var hd_id = $(this).attr('hd_id');
        var action = 'xacnhandonhang';
        $.ajax({
            type: "POST",
            url: "odermodel.php",
            data: {
                hd_id: hd_id,
                action: action
            },

            success: function(data) {
                console.log(data);
                location.reload();
            }
        });
    });
});

$(document).ready(function() {
    $(document).on('click', '#giaohang', function(e) {
        e.preventDefault();
        var giaohang = $(this).attr('giaohang');

        var action = 'giaohang';
        $.ajax({
            type: "POST",
            url: "odermodel.php",
            data: {
                giaohang: giaohang,
                action: action
            },

            success: function(data) {
                console.log(data)
                location.reload();
            }
        });
    });
});



$(document).ready(function() {
    $(document).on('click', '#bienlai', function(e) {
        var madonhang = $(this).attr('madonhang');
        var tenkhach = $(this).attr('tenkhach');
        var diachi = $(this).attr('diachi');
        var ngaymua = $(this).attr('ngaymua');
        var tongtien = $(this).attr('tongtien');
        var sodienthoai = $(this).attr('sodienthoai');
        $('#exampleModal').modal('show')

        $('#madonhang').html(madonhang);
        $('#ngaymua').html(ngaymua);
        $('#tenkhachhang').html(tenkhach);
        $('#diachikhach').html(diachi);
        $('#tongtien').html(tongtien);
        $('#sdtkhach').html(sodienthoai);
    })
})