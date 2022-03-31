$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/*---------------xem ảnh sản phẩm------------------ */
$(".arrayimg_product_detail").hover(function() {
    $("#img_product_detail").prop("src", $(this).prop("src"))
});

/*------------------Ajax cart----------------- */
function addcart(id) {
    $.post("http://localhost:8080/ShopNNP/public/addCart", {
        'id': id,
        'num': $("#num").val(),

    }, function(data) {
        alert(data.message);
        location.reload();
    });

}



function deletecart(id) {
    console.log(id)
    $.post("http://localhost:8080/ShopNNP/public/deleteCart", {
        'id': id,
    }, function(data) {
        location.reload();
    });

}
$(".num_cart_detail").change(function() {
    var id = $(this).data('id');
    $.post("http://localhost:8080/ShopNNP/public/updateCart", {
        'id': id,
        'num': $(this).val(),

    }, function(data) {
        if (data.error) {
            alert(data.message);
        }
        location.reload();
    });
});

/*===================================[Discount/order]======================================== */

function applyDiscount() {
    var code = $('#code_discount').val();
    var total = $('#total_1').data('total');
    if (code === "") {
        var discount = "-" + 0 + " <u> đ </u>";
        var temp = total + 30000;
        var total_2 = String(temp).replace(/\B(?=(\d{3})+(?!\d))/g, '.') + " <u> đ </u>";
        alert("Please enter discount code!");
        $('#discount').html(discount);
        $('#total_2').html(total_2);
        $('#price_all').val(temp);
        return;
    }
    $.post("http://localhost:8080/ShopNNP/public/applyDiscount", {
        'code': code,
        'total': total,
    }, function(data) {

        alert(data.massage);
        $('#discount').html(data.discount);
        $('#total_2').html(data.total);
        $('#price_all').val(data.price_all);

    });

}

/*===================================[ +/- num product ]=============================== */

$('.btn-num-product-down_2').on('click', function() {
    var numProduct = Number($(this).next().val());
    if (numProduct > 0) $(this).next().val(numProduct - 1);      
   
});

$('.btn-num-product-up_2').on('click', function() {
    var numProduct = Number($(this).prev().val());
    $(this).prev().val(numProduct + 1); 
});

$('.btn-num-product-down').on('click', function() {
    var numProduct = Number($(this).next().val());
    var idProduct = $(this).data('id');
    if (numProduct > 0) $(this).next().val(numProduct - 1);
    $.post("http://localhost:8080/ShopNNP/public/updateCart", {
        'id': idProduct,
        'num': Number($(this).next().val()),

    }, function(data) {
        if (data.error) {
            alert(data.message);
        }
        location.reload();
    });
});

$('.btn-num-product-up').on('click', function() {
    var numProduct = Number($(this).prev().val());
    var idProduct = $(this).data('id');
    $(this).prev().val(numProduct + 1);
    $.post("http://localhost:8080/ShopNNP/public/updateCart", {
        'id': idProduct,
        'num': Number($(this).prev().val()),
    }, function(data) {
        if (data.error) {
            alert(data.message);
        }
        location.reload();
    });
});

/*===================================[province, district, ward]======================================= */
$('#province').on('change', function() {
    var id = $('#province').val();
    $.post("http://localhost:8080/ShopNNP/public/getDistrict", {
        'id': id,
    }, function(data) {
        $('#district').html(data);
    });
});

$('#district').on('change', function() {
    var id = $('#district').val();
    console.log(id)
    $.post("http://localhost:8080/ShopNNP/public/getWard", {
        'id': id,
    }, function(data) {
        $('#ward').html(data);
    });
});

/*===================================[confirm login ]======================================= */

function confirmLogin() {
    var option = confirm('Đăng nhập để tiếp tục thực hiện?');
    if (!option) {
        return;
    }
    window.open("http://localhost:8080/ShopNNP/public/Admin/user/login");
}