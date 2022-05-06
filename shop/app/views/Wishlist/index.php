<body>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb  bg-light p-2">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bi bi-house-door-fill"></i></a></li>
                <li class="breadcrumb-item"><?php et('wishlist_index_title') ?></li>
            </ol>
        </nav>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-lg-9 category-content">
                <h1 class="section-title"><?php et('wishlist_index_title') ?></h1>

                <div class="row">
                    <?php if (!empty($products)) : ?>
                        <?php $this->getPart('parts/products_loop', compact('products')); ?>
                    <?php else : ?>
                        <p><?php et('wishlist_index_not_found') ?></p>
                    <?php endif; ?>
                </div>



            </div>
        </div>
    </div>
</body>

</html>