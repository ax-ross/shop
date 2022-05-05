<body>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb  bg-light p-2">
                <?= $breadcrumbs ?>
            </ol>
        </nav>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-lg-9 category-content">
                <h1 class="section-title"><?= $category['title'] ?></h1>

                <?php if (!empty($category['content'])) : ?>
                    <div class="category-desc">
                        <?= $category['content'] ?>;
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="input-sort">Сортировка:</label>
                            <select class="form-select" id="input-sort">
                                <option selected>По умолчанию</option>
                                <option value="1">Название (А - Я)</option>
                                <option value="2">Название (Я - А)</option>
                                <option value="3">Цена (низкая > высокая)</option>
                                <option value="3">Цена (высокая < низкая)</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="input-show">Показать:</label>
                            <select class="form-select" id="input-show">
                                <option selected>По умолчанию</option>
                                <option value="1">15</option>
                                <option value="2">25</option>
                                <option value="3">50</option>
                                <option value="3">75</option>
                                <option value="3">100</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php if (!empty($products)) : ?>
                        <?php $this->getPart('parts/products_loop', compact('products')); ?>


                        <div class="row">
                            <div class="col-md-12">
                                <p><?= count($products); ?> <?php et('tpl_total_pagination') ?> <?= $total ?></p>

                                <?php if ($pagination->countPages > 1): ?>
                                    <?= $pagination ?>
                                <?php endif; ?>
                            </div>
                        </div>


                    <?php else : ?>
                        <p><?php et('category_view_no_products') ?></p>
                    <?php endif; ?>
                </div>



            </div>
        </div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>