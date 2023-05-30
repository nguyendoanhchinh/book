// nếu trạng thái bằng 0 : chờ xác nhận
// nếu trạng thái bằng 1 : chờ lấy hàng
// nếu trạng thái bằng 2 : đang giao
// nếu trạng thái bằng 3 : đã giao
// nếu trạng thái bằng 4 : đã hủy
getAll()

function getAll() {
    var action = "getAll";

    $.ajax({
        type: "POST",
        url: "handle_oder.php",
        data: {
            action: action
        },
        success: function(data) {
            $('#tab_getAll').html(data);
        }
    })
};


$(document).ready(function() {
    $(document).on('click', '#nhanhang', function() {
        var action = 'nhanhang';

        var nhanhang = $(this).attr('nhanhang');
        $.ajax({
            type: "POST",
            url: "handle_oder.php",
            data: {
                action: action,
                nhanhang: nhanhang
            },
            success: function(data) {
                location.reload()
                console.log(data)
            }
        })
    })
})

$(document).ready(function() {
    $(document).on('click', '#huydon', function() {
        $("#myModal_huy").modal('show');
        var huydon = $(this).attr('huydon');

        $('#huy').on('click', function() {
            var action = "huy_don";

            $.ajax({
                type: "POST",
                url: "handle_oder.php",
                data: {
                    action: action,
                    huydon: huydon
                },
                success: function(data) {
                    location.reload();
                    console.log(data)
                }
            });
        });

    })
})