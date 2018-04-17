<script src="{{asset('')}}users/js/jquery.js"></script>
<script src="{{asset('')}}users/js/bootstrap.min.js"></script>
<script src="{{asset('')}}users/js/jquery.scrollUp.min.js"></script>
<script src="{{asset('')}}users/js/price-range.js"></script>
<script src="{{asset('')}}users/js/jquery.prettyPhoto.js"></script>
<script src="{{asset('')}}users/js/main.js"></script>
<script>
    $(".add-to-cart").click(function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({

            type: "GET",
            url: window.location.origin + '/them-gio-hang/' + id,
            success: function (data) {
                console.log('them hang'+ id +' ok');

            }

        })

    });
    $( document ).on( 'click', '.cart_quantity_delete', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
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
                $('#data_cart').html(data);
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
                    $('#data_cart').html(data);
                }

            })
        }

    });

  
</script>