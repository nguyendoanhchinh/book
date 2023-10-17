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

    if (!$('input.checkbox-products:checked').length) {
        $('#modal-notify').modal('show');
        return;
    } else {
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
    }

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
    // Ẩn tổng tiền ban đầu
    $("#total-price").hide();

    // Khi click vào checkbox-all-products
    $('#checkbox-all-products').change(function() {
        var isChecked = $(this).prop('checked');
        $('.checkbox-products').prop('checked', isChecked);

        // Tính tổng tiền của các sản phẩm được chọn
        sumPrice();

        // Hiển thị hoặc ẩn tổng tiền tùy thuộc vào trạng thái của checkbox-all-products
        if (isChecked) {
            $("#total-price").show();
        } else {
            $("#total-price").hide();

        }
    });

    $(document).on('change', '.num-order, .checkbox-products', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var action = "change_price";
        var id_sumprice = $(this).closest('tr').find('.loadproduct').attr('data-id');

        var changequantity = $(this).closest('tr').find('.num-order').val();
        var id_product = $(this).closest('tr').find('#product_detail').attr('product_id');
        var price_product = $(this).closest('tr').find('#product_price').attr('product_price');

        $.ajax({
            type: "POST",
            url: "add-to-cart.php",
            data: {
                action: action,
                changequantity: changequantity,
                id_product: id_product,
                price_product: price_product,
                id_sumprice: id_sumprice
            },
            success: function(data) {
                if (data) {
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                } else {
                    // Cập nhật giá tiền của các checkbox được chọn
                    sumPrice();

                    $('.loadproduct[data-id="' + id_sumprice + '"]').load(window.location.href + ' .loadproduct[data-id="' + id_sumprice + '"]');
                    // Kiểm tra nếu có ít nhất một checkbox được chọn thì hiển thị tổng tiền
                    if ($('.checkbox-products:checked').length > 0) {
                        $("#total-price").show();
                    } else {
                        $("#total-price").hide();


                    }

                }
            }
        });
    });

    // Tính tổng tiền của các checkbox được chọn khi tải trang và khi có sự thay đổi
    sumPrice();
});

function sumPrice(id_sumprice) {
    var action = 'tongtien';
    var selectedIds = [];

    $('.checkbox-products:checked').each(function() {
        var id_product = $(this).val();
        selectedIds.push(id_product);
    });
    $.ajax({
        url: "add-to-cart.php",
        type: "POST",
        data: {
            action: action,
            selectedIds: selectedIds
        },
        success: function(response) {
            $("#total-price span").text(response);
        }
    });
};

//thanh toán
$(document).ready(function() {
    $(document).on('click', '#checkout-cart', function(e) {
        e.preventDefault();

        if (!$('input.checkbox-products:checked').length) {
            $('#modal-notify-checkout').modal('show');
            return;
        } else {
            // Lấy danh sách các sản phẩm đã chọn
            var selectedProducts = [];

            $('input.checkbox-products:checked').each(function() {
                var id_product = $(this).closest('tr').find('#product_detail').attr('product_id');
                var price_product = $(this).closest('tr').find('#product_price').attr('product_price');
                var quantity = $(this).closest('tr').find('.num-order').val();

                selectedProducts.push({
                    id_product: id_product,
                    price_product: price_product,
                    quantity: quantity
                });
            });

            // Chuyển đến trang cart.php và truyền danh sách sản phẩm đã chọn

            var form = $('<form method="POST" action="checkout.php"></form>');
            var input = $('<input type="hidden" name="selectedProducts">').val(JSON.stringify(selectedProducts));
            form.append(input);
            $('body').append(form);
            form.submit();
        }
    });
});
//thay đổi địa chỉ  nhận hàng 
$(document).on('click', '#deliveryAddress', function() {
    var mail_k = $(this).attr('mail_k');
    var name = $(this).attr('username_k');
    var id_k = $(this).attr('id_k');

    var phone = $(this).attr('phone_k');
    var addrees = $(this).attr('addrees_k');
    $('#myModal_address').modal('show');

    $('#email_k').val(mail_k);
    $('#id_k').val(id_k);
    $('#username_k').val(name);
    $('#phone_k').val(phone);
    $('#address_k').val(addrees);
})
$(document).on('click', '#update_address', function() {
    var action = 'change_address';
    var id_k = $('#id_k').val();
    var email_k = $('#email_k').val();
    var username_k = $('#username_k').val();
    var phone_k = $('#phone_k').val();
    var address_k = $('#address_k').val();
    $.ajax({
        type: 'POST',
        url: 'add-to-cart.php',
        data: {
            action: action,
            id_k: id_k,
            email_k: email_k,
            username_k: username_k,
            phone_k: phone_k,
            address_k: address_k
        },
        success: function(data) {

            $('#myModal_address').modal('hide');
            location.reload();

        }
    });
});

// thanh toán
$(document).ready(function() {
    $("#checkout").click(function(e) {
        e.preventDefault();
        var action = "oder";
        var note = $('input[placeholder="Lưu ý cho người bán..."]').val();
        // Lấy dữ liệu từ tbody
        var selectedProducts = [];
        $("#cart-items tr").each(function() {
            var id_product = $(this).find(".loadproduct").data("id");
            var price_product = parseInt($(this).find("td:nth-child(3)").text().trim().replace(/[^0-9]/g, ''));
            var quantity = parseInt($(this).find(".num-order").text().trim().replace(/[^0-9]/g, ''));
            selectedProducts.push({
                id_product: id_product,
                price_product: price_product,
                quantity: quantity
            });
        });
        // Gửi dữ liệu thông qua Ajax
        $.ajax({
            url: "add-to-cart.php",
            type: "POST",
            data: {
                action: action,
                note: note,
                selectedProducts: JSON.stringify(selectedProducts)
            },
            success: function(response) {
                // Xử lý phản hồi từ server nếu cần thiết
                console.log(response);
                // redirect(chuyển hướng) tới oder.php 
                window.location.href = "oder.php";
            },
        });
    });
});