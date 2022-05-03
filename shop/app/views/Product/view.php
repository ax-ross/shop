<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb  bg-light p-2">
            <?= $breadcrumbs ?>
        </ol>
    </nav>
</div>

<div class="container py-3">
    <div class="row">
        <div class="col-md-4 order-md-2">
            <h1><?= $product['title'] ?></h1>

            <ul class="list-unstyled">
                <li><i class="bi bi-check2 me-1"></i>В наличии</li>
                <li><i class="bi bi-truck me-1"></i>Ожидается</li>
                <li><i class="bi bi-tags"></i>
                    <span class="product-price">
                        <?php if ($product['old_price']) : ?>
                            <small><?= $product['old_price'] ?></small>
                        <?php endif ?>
                        <?= $product['price'] ?>
                    </span>
                </li>
            </ul>
            <div id="product">
                <div class="input-group mb-3">
                    <input id="input-amount" type="text" class="form-control" name="amount" value="1">
                    <button class="btn btn-buy add-to-cart" type="button" data-id="<?= $product['id'] ?>"><?php et('product_view_buy') ?></button>
                </div>
            </div>
        </div>
        <div class="col-md-8 order-md-1">
            <ul class="thumbnails list-unstyled clearfix">
                <li class="thumb-main text-center"><a class="thumbnail" href="<?= PATH . $product['img'] ?>" data-effect="mfp-zoom-in"><img src="<?= PATH . $product['img'] ?>" alt=""></a></li>

                <?php if (!empty($gallery)) : ?>
                    <?php foreach ($gallery as $item) : ?>
                        <li class="thumb-additional"><a class="thumbnail" href="<?= PATH . $item['img'] ?>" data-effect="mfp-zoom-in"><img src="<?= $item['img'] ?>" alt=""></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="tab-pane fade show active" id="description">
                <?= $product['content']; ?>
            </div>

        </div>
    </div>
</div>