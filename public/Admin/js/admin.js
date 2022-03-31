$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('#content').summernote({
        placeholder: 'Nhập nội dung',
        tabsize: 2,
        height: 250
    })
});


if ($('#image').val() == "") {
    $('#immage_form_product').hide();
} else {
    $('#immage_form_product').show();
    $('#immage_form_product').prop("src", $('#image').val());
}
$('#image').change(function() {
    if ($('#image').val() == "") {
        $('#immage_form_product').hide();
    } else {
        $('#immage_form_product').show();
        $('#immage_form_product').prop("src", $('#image').val());
    }

});

function delete_product(id) {
    var option = confirm('Bạn có chắc muốn xóa sản phẩm này không?');
    if (!option) {
        return;
    }
    $.post("http://localhost:8080/ShopNNP/public/Admin/product/delete", {
            'id': id,
            'type': 'delete',
        },
        function(data) {
            alert(data.message);
            if (!data.error) {
                location.reload();
            }
        });

}

function delete_category(id) {
    var option = confirm('Bạn có chắc muốn xóa danh mục này không?');
    if (!option) {
        return;
    }
    $.post("http://localhost:8080/ShopNNP/public/Admin/category/delete", {
        'id': id,
        'type': 'delete',

    }, function(data) {
        alert(data.message);
        if (!data.error) {
            location.reload();
        }
    });

}

function delete_slider(id) {
    var option = confirm('Bạn có chắc muốn xóa slider này không?');
    if (!option) {
        return;
    }
    $.post("http://localhost:8080/ShopNNP/public/Admin/slider/delete", {
        'id': id,
        'type': 'delete',

    }, function(data) {
        alert(data.message);
        if (!data.error) {
            location.reload();
        }
    });

}

function delete_discount(code) {
    var option = confirm('Bạn có chắc muốn xóa mã code ' + code + ' không?');
    if (!option) {
        return;
    }
    $.post("http://localhost:8080/ShopNNP/public/Admin/discount/delete", {
        'code': code,
        'type': 'delete',

    }, function(data) {
        alert(data.message);
        if (!data.error) {
            location.reload();
        }
    });

}
/*=================================================== update order status =============================================== */
function update_orderstatus(id) {
    var option = confirm('Bạn có chắc muốn xác nhận  đơn hàng này không?');
    if (!option) {
        return;
    }
    $.post("http://localhost:8080/ShopNNP/public/Admin/order/orderDetail/updateOrderstatus", {
        'id': id,
        'type': 'update',

    }, function(data) {
        alert(data.message);
        if (!data.error) {
            location.reload();
        }
    });
}