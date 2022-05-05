<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <?= $this->getMeta() ?>
</head>

<body>

    <header class="sticky-top">
        <div class="header-top py-3">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col">
                        <a href="tel:+71234567890" class="icon-phone">
                            <span class="pe-2"><i class="bi bi-telephone"></i></span>+7 123 456-78-90
                        </a>
                    </div>
                    <div class="col icons text-end">

                        <form action="search" id="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?php et('tpl_search') ?>" aria-label="search" name="search">
                                <button class="btn close-search" type="button"><i class="bi bi-x"></i></button>
                                <button class="btn" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>

                        <a href="" class="open-search"><i class="bi bi-search"></i></a>

                        <!-- Button trigger modal -->
                        <a href="" data-bs-toggle="modal" data-bs-target="#cart-modal" class="open-cart-modal" id="get-cart">
                            <i class="bi bi-cart"></i>
                            <span class="badge bg-danger rounded-pill count-items"><?= $_SESSION['cart.amount'] ?? 0 ?></span>
                        </a>
                        <a href=""><i class="bi bi-heart"></i></a>


                        <div class="dropdown d-inline-block">
                            <a href="" class="dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#"><?php et('tpl_login') ?></a></li>
                                <li><a class="dropdown-item" href="#"><?php et('tpl_signup') ?></a></li>
                            </ul>
                        </div>

                        <?php new app\widgets\language\Language(); ?>

                    </div>
                </div>
            </div>
        </div> <!-- END Header-top -->

        <div class="header-bottom py-2">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid p-0">
                        <a class="navbar-brand" href="<?= base_url() ?>"><?= \axross\App::$app->getProperty('site_name') ?></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <?php new \app\widgets\menu\Menu([
                                'class' => "navbar-nav ms-auto mb-2 mb-lg-0",
                                'cache' => 30
                            ]); ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div> <!-- END Header-bottom -->

    </header>