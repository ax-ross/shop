<body>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb  bg-light p-2">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bi bi-house-door-fill"></i></a></li>
                <li class="breadcrumb-item"><?php et('search_index_search_title') ?></li>
            </ol>
        </nav>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-lg-9 category-content">
                <h1 class="section-title"><?php et('search_index_search_title') ?></h1>

                <h4><?php et('search_index_search_query') ?><?= htmlspecialchars($search); ?></h4>

                <div class="row">
                    <?php if (!empty($products)) : ?>
                        <?php $this->getPart('parts/products_loop', compact('products')); ?>


                        <div class="row">
                            <div class="col-md-12">
                                <p><?= count($products); ?> <?php et('tpl_total_pagination') ?> <?= $total ?></p>

                                <?php if ($pagination->countPages > 1) : ?>
                                    <?= $pagination ?>
                                <?php endif; ?>
                            </div>
                        </div>


                    <?php else : ?>
                        <p><?php et('search_index_not_found') ?></p>
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