$(document).ready(function() {
    $(".add-to-cart").click(function(e) {
        e.preventDefault();
        var action = "add";
        var $form = $(this).closest(".form-submit");
        var s_id = $form.find(".pid").val();

        var s_price = $form.find(".pprice").val();

        var s_qty = $form.find(".pqty").val();


        $.ajax({
            url: 'add-to-cart.php',
            method: 'post',
            data: {
                action: action,
                s_id: s_id,
                s_price: s_price,
                s_qty: s_qty,

            },
            success: function(data) {
                $('.modal-body').html(data)
                $('#hienthisoluong').text(parseInt($('#hienthisoluong').text()) + 1);
            }
        });
    })
});
$(document).on('click', '#add_products', function(e) {
        e.preventDefault();

        var action = "add_product";
        var s_id = $(this).attr('s_id');
        var s_price = $(this).attr('s_price');
        var s_sl = $(this).attr('s_sl');

        $.ajax({
            type: "POST",
            url: "add-to-cart.php",
            data: {
                s_id: s_id,
                action: action,
                s_price: s_price,
                s_sl: s_sl
            },
            success: function(data) {

                $('.modal-body').html(data)
                $('#hienthisoluong').text(parseInt($('#hienthisoluong').text()) + 1);
            }

        })
    })
    // xóa 1 sản phẩm 
$(document).on('click', '.delete_product', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    // Hiển thị modal
    $('#confirm-delete-modal').modal('show');

    // Xử lý xóa sản phẩm khi người dùng nhấn "Xác nhận"
    $('#confirm-delete-btn').on('click', function() {
        var action = "delete_product";
        $.ajax({
            type: "POST",
            url: "add-to-cart.php",
            data: {
                action: action,
                id: id
            },
            success: function(data) {
                location.reload();
            }
        });
    });
});
// xóa tất cả sản phẩm
$(document).on('click', '#delete_all', function(e) {
    e.preventDefault();

    // Hiển thị modal
    $('#confirm-delete-modal').modal('show');

    // Xử lý xóa tất cả dữ liệu khi người dùng nhấn "Xác nhận"
    $('#confirm-delete-btn').on('click', function() {
        var action = "delete_all";
        $.ajax({
            type: "POST",
            url: "add-to-cart.php",
            data: {
                action: action
            },
            success: function(data) {
                location.reload();
            }
        });
    });
});
jQuery('em.minus').on('click', function() {
    var currentVal = parseInt(jQuery('#number').val(), 10);
    if (currentVal > 0) {
        jQuery('#number').val(currentVal - 1);
    }
});
jQuery('em.plus').on('click', function() {
    var currentVal = parseInt(jQuery('#number').val(), 10);
    if (currentVal < 100) {
        jQuery('#number').val(currentVal + 1);
    }
});