<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb  bg-light p-2">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bi bi-house-door-fill"></i></a></li>
            <li class="breadcrumb-item"><?php et('tpl_personal_area'); ?></li>
        </ol>
    </nav>
</div>

<div class="container py-3">
    <div class="row">
        <div class="col-12">
            <h1 class="section-title"><?php et('tpl_cabinet'); ?></h1>
        </div>

        <?php $this->getPart('parts/cabinet_sidebar'); ?>

        <div class="col-md-9 order-md-1">
            <ul class="list-unstyled">
                <li><a href="user/orders"><?php et('tpl_orders'); ?></a></li>
                <li><a href="user/files"><?php et('tpl_orders_files'); ?></a></li>
                <li><a href="user/credentials"><?php et('tpl_user_credentials'); ?></a></li>
                <li><a href="user/logout"><?php et('tpl_user_logout'); ?></a></li>
            </ul>
        </div>
    </div>
</div>