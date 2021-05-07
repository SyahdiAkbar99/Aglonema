<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('assets/user/js/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('assets/user/js/animsition.min.js') ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('assets/user/js/popper.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/user/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('assets/user/js/select2.min.js') ?>"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('assets/user/js/slick.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/user/js/slick-custom.js') ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('assets/user/js/countdowntime.js') ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('assets/user/js/lightbox.min.js') ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('assets/user/js/sweetalert.min.js') ?>"></script>
<script type="text/javascript">
    $('.block2-btn-addcart').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    $('.block2-btn-addwishlist').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
</script>

<!--===============================================================================================-->
<script src="<?= base_url('assets/user/js/main.js') ?>"></script>

</body>

</html>