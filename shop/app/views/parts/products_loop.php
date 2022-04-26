<?php foreach ($products as $product) : ?>
    <div class="col-md-4 col-sm-6 mb-3">
        <div class="product-card">
            <div class="product-img">
                <a href="product/<?= $product['slug'] ?>"><img src="<?= $product['img'] ?>" alt=""></a>
            </div>
            <div class="product-details">
                <h4><a href="product/<?= $product['slug'] ?>"><?= $product['title'] ?></a></h4>
                <p><?= $product['excerpt'] ?></p>
                <div class="product-bottom-details d-flex justify-content-between">
                    <div class="product-price">
                        <?php if ($product['old_price']) : ?>
                            <small><?= $product['old_price'] ?>&#x20bd;</small>
                        <?php endif ?>
                        <?= $product['price'] ?>&#x20bd;
                    </div>
                    <div class="product-links">
                        <a href="#"><i class="bi bi-cart"></i></a>
                        <a href="#"><i class="bi bi-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>