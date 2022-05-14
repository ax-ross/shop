<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb  bg-light p-2">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bi bi-house-door-fill"></i></a></li>
            <li class="breadcrumb-item"><a href="user/cabinet"><?php et('tpl_cabinet'); ?></a></li>
            <li class="breadcrumb-item"><a href="user/orders"><?php et('user_order_list') ?></a></li>
            <li class="breadcrumb-item active"><?php et('user_order_title') ?></li>
        </ol>
    </nav>
</div>

<div class="container py-3">
    <div class="row">
        <div class="col-12">
            <h1 class="section-title"><?php et('user_order_title') ?></h1>
        </div>

        <?php $this->getPart('parts/cabinet_sidebar'); ?>

        <div class="col-md-9 order-md-1">
            <?php if (!empty($order)) : ?>
                <div class="table-responsive">
                    <table class="table text-start table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"><?php et('user_order_product_title') ?></th>
                                <th scope="col"><?php et('user_orderproduct_price') ?></th>
                                <th scope="col"><?php et('user_order_product_amount') ?></th>
                                <th scope="col"><?php et('user_order_product_sum') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="product/<?= $order['slug'] ?>"><?= $order['title'] ?></a></td>
                                <td><?= $order['price'] ?> &#x20bd;</td>
                                <td><?= $order['amount'] ?></td>
                                <td><?= $order['sum'] ?> &#x20bd;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="box">
                    <h3 class="box-title"><?php et('user_order_details'); ?></h3>
                    <div class="box-content">
                        <div class="table-responsive">
                            <table class="table text-start table-striped">
                                <tr>
                                    <td><?php et('user_order_num') ?></td>
                                    <td><?= $order['order_id'] ?></td>
                                </tr>
                                <tr>
                                    <td><?php et('user_order_status'); ?></td>
                                    <td><?php et("user_order_status_{$order['status']}"); ?></td>
                                </tr>
                                <tr>
                                    <td><?php et('user_order_created') ?></td>
                                    <td><?= $order['created_at'] ?></td>
                                </tr>
                                <tr>
                                    <td><?php et('user_order_updated') ?></td>
                                    <td><?= $order['updated_at'] ?></td>
                                </tr>
                                <tr>
                                    <td><?php et('user_order_total') ?></td>
                                    <td><?= $order['total'] ?> &#x20bd;</td>
                                </tr>
                                <tr>
                                    <td><?php et('user_order_note') ?></td>
                                    <td><?= $order['note'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>