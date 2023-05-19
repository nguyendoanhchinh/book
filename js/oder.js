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
        success: function(response) {


            $('#tab_getAll').html(response);

        }
    })
};

function getAll() {
    var action = "getAll";
    var status1 = 1;
    var status2 = 2;
    var status3 = 3;
    var status4 = 4;
    $.ajax({
        type: "POST",
        url: "handle_oder.php",
        data: {
            action: action

        },
        success: function(data) {

            if (data) {
                if (data.status == 0) {
                    $('#tab_choxacnhan').html(data);
                } else if (data.status == 1) {
                    $('#tab_cholayhang').html(data);
                } else if (data.status == 2) {
                    $('#tab_danggiao').html(data);
                } else if (data.status == 3) {
                    $('#tab_dagiao').html(data);
                } else if (data.status == 4) {
                    $('#tab_dahuy').html(data);
                } else {
                    $('#tab_getAll').html(data);
                }
            }
        }
    });
}