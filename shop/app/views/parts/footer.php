<footer>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <h4><?php et('tpl_info') ?></h4>

                    <?php new \app\widgets\page\Page([
                        'cache' => 0,
                        'class' => 'list-unstyled',
                        'prepend' => '<li><a href="' . base_url() . '">' . gt('tpl_homepage') . '</a></li>',
                    ]); ?>
                    <!-- <ul class="list-unstyled">
                        <li><a href="index.html"><?php et('tpl_homepage') ?></a></li>
                        <li><a href="#"><?php et('tpl_about_shop') ?></a></li>
                        <li><a href="#"><?php et('tpl_payment_and_delivery') ?></a></li>
                        <li><a href="#"><?php et('tpl_warranty') ?></a></li>
                    </ul> -->


                </div>

                <div class="col-md-3 col-6">
                    <h4><?php et('tpl_opening_hours') ?></h4>
                    <ul class="list-unstyled">
                        <li><?php et('tpl_adress') ?></li>
                        <li><?php et('tpl_schedule') ?></li>
                        <li><?php et('tpl_nonstop') ?></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4><?php et('tpl_contacts') ?></h4>
                    <ul class="list-unstyled">
                        <li><a href="tel:+71234567890">+7 123 456-78-90</a></li>
                        <li><a href="tel:+71234567890">+7 123 456-78-90</a></li>
                        <li><a href="tel:+71234567890">+7 123 456-78-90</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4><?php et('tpl_we_are_online') ?></h4>
                    <div class="footer-icons">
                        <a href="#"><i class="bi bi-telegram"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</footer>


<button id="go-up">
    <i class="bi bi-chevron-double-up"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="cart-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cart-modal"><?php et('tpl_cart_title') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-cart-content">

            </div>
        </div>
    </div>
</div>





<script>
    const PATH = '<?= PATH ?>'
</script>
<script src="<?= PATH ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= PATH ?>/assets/js/jquery-3.6.0.min.js"></script>
<script src="<?= PATH ?>/assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?= PATH ?>/assets/js/sweetalert2.js"></script>
<script src="<?= PATH ?>/assets/js/main.js"></script>

<?php $this->getDbLogs() ?>

</body>

</html>