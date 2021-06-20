<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45" id="contact">
    <div class="flex-c-t p-b-50">

    </div>

    <div class="t-center p-l-15 p-r-15">
        <div class="t-center s-text8 p-t-20">
            Copyright © 2021 All rights reserved.
        </div>
    </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>
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

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
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
<script src="<?= base_url('assets/user/js/script.js') ?>"></script>

</body>

</html>