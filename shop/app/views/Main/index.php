<?php if (!empty($slides)) : ?>
    <div class="container-fluid my-carousel px-0">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <?php for ($i = 0; $i < count($slides); $i++) : ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>" <?php if ($i == 0) echo 'class="active"' ?> aria-current="true" aria-label="Slide <?= $i ?>"></button>
                <?php endfor; ?>
            </div>
            <div class="carousel-inner">
                <?php $i = 1;
                foreach ($slides as $slide) : ?>
                    <div class="carousel-item <?php if ($i == 1) echo 'active' ?>">
                        <img src="<?= PATH . $slide->img ?>" class="d-block w-100" alt="...">
                    </div>
                <?php $i++;
                endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty($products)) : ?>
    <section class="recomended-products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section-title"><?php et('main_index_featured_products') ?></h3>
                </div>

                <?php $this->getPart('parts/products_loop', compact('products')) ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<section class="advantages">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title"><?php et('main_index_advantages') ?></h3>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="advantage-item text-center">
                    <p><i class="bi bi-truck"></i></p>
                    <p><?php et('main_index_fast_delivery') ?></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="advantage-item text-center">
                    <p><i class="bi bi-boxes"></i></p>
                    <p><?php et('main_index_wide_range') ?></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="advantage-item text-center">
                    <p><i class="bi bi-tags"></i></p>
                    <p><?php et('main_index_low_prices') ?></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="advantage-item text-center">
                    <p><i class="bi bi-headset"></i></p>
                    <p><?php et('main_index_support') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>