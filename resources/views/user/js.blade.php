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
        // alert();
        console.log(id);
    });
</script>