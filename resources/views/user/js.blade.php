<script src="{{asset('')}}users/js/jquery.js"></script>
<script src="{{asset('')}}users/js/bootstrap.min.js"></script>
<script src="{{asset('')}}users/js/jquery.scrollUp.min.js"></script>
<script src="{{asset('')}}users/js/price-range.js"></script>
<script src="{{asset('')}}users/js/jquery.prettyPhoto.js"></script>
<script src="{{asset('')}}users/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

<script>
    $("#add_to_cart").click(function () {

        var id = $(this).attr('data-id');
        var value = $(this).prev().val();
        if(value > 0){
            $.ajax({
                type: "GET",
                url: window.location.origin + '/them-hang/' + id + '/' + value,
                success: function (data) {
                    if(data == 1){
                        notifyAdd();
                    }else if(data == 0){
                        notifyError();
                    }else{
                        notifyWarn();
                    }
                }

            })
        }
    })

    $(".add-to-cart").click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({

            type: "GET",
            url: window.location.origin + '/them-gio-hang/' + id,
            success: function (data) {
                if(data == 1){
                    notifyAdd();
                }else if(data == 0){
                    notifyError();
                }else{
                    notifyWarn();
                }
            }

        })

    });

    $( document ).on( 'click', '.cart_quantity_delete', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        notifyDelete();
        console.log(id);
        $.ajax({
            type: "GET",
            url: window.location.origin + '/xoa-gio-hang/' + id,
            success: function (data) {
                $('#data_cart').html(data);
            }

        })

    });

    $(document).on('click', '.cart_quantity_up', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var value = $(this).siblings().val();
        value = parseInt(value) + 1;
        // console.log(value);
        $.ajax({
            type: "GET",
            url: window.location.origin + '/cap-nhat-hang/' + id + '/' + value,
            success: function (data) {
                if(data == 0){
                    notifyWarn();
                }else{
                    $('#data_cart').html(data);
                }

            }

        })
    });

    $(document).on('click', '.cart_quantity_down', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var value = $(this).prev().val();
        value = parseInt(value) - 1;
        if(value > 0){
            $.ajax({
                type: "GET",
                url: window.location.origin + '/cap-nhat-hang/' + id + '/' + value,
                success: function (data) {
                    $('#data_cart').html(data);
                }

            })
        }

    });

    $(document).on('change', '.cart_quantity_input', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var value = $(this).val();
        if(value > 0){
            $.ajax({
                type: "GET",
                url: window.location.origin + '/cap-nhat-hang/' + id + '/' + value,
                success: function (data) {
                    if(data == 0){
                        notifyWarn();
                    }else{
                        $('#data_cart').html(data);
                    }
                }

            })
        }

    });

    $('#search').keypress(function (e) {
        if (e.which == 13) {
            $('#frm_search').submit();
            return false;    //<---- Add this line
        }
    });

    $(document).on('click', '#datHang', function(e){
        e.preventDefault();
        notifySusses();
        setTimeout(function(){
            $.ajax({
                type: "GET",
                url: window.location.origin + '/dat-hang',
                success: function (data) {
                    if(data == 1){
                        window.location.href =  window.location.origin;
                    }
                }

            })
        }, 3000);

    });

    function notifyAdd() {
        $.notify("Đã thêm sản phẩm vào giỏ hàng", "success");
    }

    function notifyDelete() {
        $.notify("Đã xóa 1 sản phẩm từ giỏ hàng", "error");
    }

    function notifyError() {
        $.notify("Sản phẩm này đã hết hàng", "error");
    }

    function notifyWarn(){
        $.notify("Đã vượt quá số lượng hàng trong kho", "error");
    }

    function notifySusses(){
        $.notify("Đặt hàng thành công, chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng", "success");
    }
</script>