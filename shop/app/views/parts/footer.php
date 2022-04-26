<footer>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <h4>Информация</h4>
                    <ul class="list-unstyled">
                        <li><a href="index.html">Главная</a></li>
                        <li><a href="#">О магазине</a></li>
                        <li><a href="#">Оплата и доставка</a></li>
                        <li><a href="#">Гарантия</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Время работы</h4>
                    <ul class="list-unstyled">
                        <li>г. Москва, ул. Пушкина, 37</li>
                        <li>пн-вс: 9:00 - 18:00</li>
                        <li>без перерыва</li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Контакты</h4>
                    <ul class="list-unstyled">
                        <li><a href="tel:+71234567890">+7 123 456-78-90</a></li>
                        <li><a href="tel:+71234567890">+7 123 456-78-90</a></li>
                        <li><a href="tel:+71234567890">+7 123 456-78-90</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Мы в сети</h4>
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
                <h5 class="modal-title" id="cart-modal">Корзина</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table text-start">
                    <thead>
                        <tr>
                            <th scope="col">Фото</th>
                            <th scope="col">Товар</th>
                            <th scope="col">Кол-во</th>
                            <th scope="col">Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href=""><img src="https://via.placeholder.com/400x300" alt=""></a></td>
                            <td><a href="">Name 1</a></td>
                            <td>1</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td><a href=""><img src="https://via.placeholder.com/300x400" alt=""></a></td>
                            <td><a href="">Name 2</a></td>
                            </td>
                            <td>1</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td><a href=""><img src="https://via.placeholder.com/400x400" alt=""></a></td>
                            <td><a href="">Name 3</a></td>
                            </td>
                            <td>1</td>
                            <td>100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn continue-shoping " data-bs-dismiss="modal">Продолжить
                    покупки</button>
                <button type="button" class="btn checkout">Оформить заказ</button>
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
<script src="<?= PATH ?>/assets/js/main.js"></script>

<?php $this->getDbLogs() ?>

</body>

</html>