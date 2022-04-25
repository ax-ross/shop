<?php if (!empty($slides)) : ?>
    <div class="container-fluid my-carousel px-0">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <?php for ($i = 0; $i < count($slides); $i++) : ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>" <?php if ($i == 0) echo 'class="active"' ?> aria-current="true" aria-label="Slide <?= $i ?>"></button>
                <?php endfor; ?>
            </div>
            <div class="carousel-inner">
                <?php $i = 1; foreach ($slides as $slide) : ?>
                    <div class="carousel-item <?php if ($i == 1) echo 'active' ?>">
                        <img src="<?= PATH . $slide->img ?>" class="d-block w-100" alt="...">
                    </div>
                <?php $i++; endforeach; ?>
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

<section class="recomended-products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title">Рекомендуемые товары</h3>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-img">
                        <a href="product.html"><img src="https://via.placeholder.com/800x600" alt=""></a>
                    </div>
                    <div class="product-details">
                        <h4><a href="product.html">Title</a></h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, dicta?</p>
                        <div class="product-bottom-details d-flex justify-content-between">
                            <div class="product-price">
                                <small>1000.00 руб</small>
                                850.00 руб
                            </div>
                            <div class="product-links">
                                <a href="#"><i class="bi bi-cart"></i></a>
                                <a href="#"><i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-img">
                        <a href="product.html"><img src="https://via.placeholder.com/600x800" alt=""></a>
                    </div>
                    <div class="product-details">
                        <h4><a href="product.html">Title</a></h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, dicta?</p>
                        <div class="product-bottom-details d-flex justify-content-between">
                            <div class="product-price">
                                <small>1000.00 руб</small>
                                850.00 руб
                            </div>
                            <div class="product-links">
                                <a href="#"><i class="bi bi-cart"></i></a>
                                <a href="#"><i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-img">
                        <a href="product.html"><img src="https://via.placeholder.com/600x600" alt=""></a>
                    </div>
                    <div class="product-details">
                        <h4><a href="product.html">Title</a></h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto dignissimos minima illum cupiditate a vel distinctio incidunt modi numquam minus?</p>
                        <div class="product-bottom-details d-flex justify-content-between">
                            <div class="product-price">
                                <small>1000.00 руб</small>
                                850.00 руб
                            </div>
                            <div class="product-links">
                                <a href="#"><i class="bi bi-cart"></i></a>
                                <a href="#"><i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-img">
                        <a href="product.html"><img src="https://via.placeholder.com/800x600" alt=""></a>
                    </div>
                    <div class="product-details">
                        <h4><a href="product.html">Lorem ipsum dolor sit amet consectetur.</a></h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, dicta?</p>
                        <div class="product-bottom-details d-flex justify-content-between">
                            <div class="product-price">
                                <small>1000.00 руб</small>
                                850.00 руб
                            </div>
                            <div class="product-links">
                                <a href="#"><i class="bi bi-cart"></i></a>
                                <a href="#"><i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-img">
                        <a href="product.html"><img src="https://via.placeholder.com/800x600" alt=""></a>
                    </div>
                    <div class="product-details">
                        <h4><a href="product.html">Title</a></h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, dicta?</p>
                        <div class="product-bottom-details d-flex justify-content-between">
                            <div class="product-price">
                                <small>1000.00 руб</small>
                                850.00 руб
                            </div>
                            <div class="product-links">
                                <a href="#"><i class="bi bi-cart"></i></a>
                                <a href="#"><i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 mb-3">
                <div class="product-card">
                    <div class="product-img">
                        <a href="product.html"><img src="https://via.placeholder.com/800x600" alt=""></a>
                    </div>
                    <div class="product-details">
                        <h4><a href="product.html"></h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, dicta?</p>
                        <div class="product-bottom-details d-flex justify-content-between">
                            <div class="product-price">
                                <small>1000.00 руб</small>
                                850.00 руб
                            </div>
                            <div class="product-links">
                                <a href="#"><i class="bi bi-cart"></i></a>
                                <a href="#"><i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="advantages">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title">Наши преимущества</h3>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="advantage-item text-center">
                    <p><i class="bi bi-truck"></i></p>
                    <p>Поставки от производителей</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="advantage-item text-center">
                    <p><i class="bi bi-boxes"></i></p>
                    <p>Широкий ассортимент</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="advantage-item text-center">
                    <p><i class="bi bi-tags"></i></p>
                    <p>Низкие цены</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="advantage-item text-center">
                    <p><i class="bi bi-headset"></i></p>
                    <p>Круглосуточная поддержка</p>
                </div>
            </div>
        </div>
    </div>
</section>