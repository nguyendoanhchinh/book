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
// xóa sản phẩm check box
$(document).on('click', '#delete_all', function(e) {
    e.preventDefault();

    // Hiển thị modal
    $('#confirm-delete-modal').modal('show');

    // Xử lý xóa tất cả dữ liệu khi người dùng nhấn "Xác nhận"
    $('#confirm-delete-btn').on('click', function() {
        var action = "delete_all";
        var namecheckbox = $('input.checkbox-products:checked').map(function() {
            return $(this).val();
        }).get();

        if (namecheckbox.length > 0) {
            $.ajax({
                type: "POST",
                url: "add-to-cart.php",
                data: {
                    action: action,
                    namecheckbox: namecheckbox
                },
                success: function(data) {
                    location.reload();
                }
            });
        }

    });
});
$(document).ready(function() {
    $("#checkbox-all-products").click(function() {
        if ($(this).is(':checked')) {
            $('.checkbox-products').prop('checked', true);
        } else {
            $('.checkbox-products').prop('checked', false);
        }
    });

    $('.checkbox-products').click(function() {
        var allChecked = true;
        $('.checkbox-products').each(function() {
            if (!$(this).is(':checked')) {
                allChecked = false;
                return false; // Thoát khỏi vòng lặp nếu có một ô checkbox không được chọn
            }
        });
        $('#checkbox-all-products').prop('checked', allChecked);
    });
});


$(document).ready(function() {
    $(document).on('change', '.num-order', function(e) {
        e.preventDefault();
        var action = "change_price";
        var changequantity = $(this).val();
        var id_product = $(this).closest('tr').find('#product_detail').attr('product_id');
        var price_product = $(this).closest('tr').find('#product_price').attr('product_price');

        $.ajax({
            type: "POST",
            url: "add-to-cart.php",
            data: {
                action: action,
                changequantity: changequantity,
                id_product: id_product,
                price_product: price_product
            },
            success: function(data) {
                if (data) {
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                } else {
                    // Tải lại phần HTML giỏ hàng
                    $('.loadAll').load(window.location.href + ' .loadAll');
                    sumAllPrice();
                }
            }
        });
    });
});


//tổng tiền 

function sumAllPrice() {
    var action = 'tongtien';


    $.ajax({
        url: "add-to-cart.php",
        type: "POST",
        data: {
            action: action,

        },
        success: function(response) {
            $("#total-price span").text(response);
        }
    });
};
sumAllPrice();