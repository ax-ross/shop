<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb  bg-light p-2">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bi bi-house-door-fill"></i></a></li>
            <li class="breadcrumb-item"><?php et('tpl_cart_title') ?></li>
        </ol>
    </nav>
</div>

<div class="conteiner py-3">
    <div class="row">
        <div class="col-lg-12 category-content">
            <h1 class="section-title"><?php et('tpl_cart_title') ?></h1>

            <?php if (!empty($_SESSION['cart'])) : ?>
                <div class="table-responsive cart-table">
                    <table class="table text-start">
                        <thead>
                            <?php if (!empty($_SESSION['cart'])) : ?>
                                <div class=" text-end">
                                    <button type="button" class="btn empty-trash" id="clear-cart"><?php et('tpl_cart_clear') ?></button>
                                </div>

                            <?php endif; ?>
                            <tr>
                                <th scope="col"><?php et('tpl_cart_photo') ?></th>
                                <th scope="col"><?php et('tpl_cart_product') ?></th>
                                <th scope="col"><?php et('tpl_cart_amount') ?></th>
                                <th scope="col"><?php et('tpl_cart_price') ?></th>
                                <th scrope=col><i class="bi bi-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['cart'] as $id => $item) : ?>
                                <tr>
                                    <td><a href="product/<?= $item['slug'] ?>"><img src="<?= PATH . $item['img'] ?>" alt=""></a></td>
                                    <td><a href="product/<?= $item['slug'] ?>"><?= $item['title'] ?></a></td>
                                    <td><?= $item['amount'] ?></td>
                                    <td><?= $item['price'] ?> &#x20bd;</td>
                                    <td><a href="cart/delete?id=<?= $id ?>" class="del-item" data-id="<?= $id ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" class="text-end"><?php et('tpl_cart_total_amount') ?></td>
                                <td class="cart-amount"><?= $_SESSION['cart.amount'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><?php et('tpl_cart_sum') ?></td>
                                <td class="cart-sum"><?= $_SESSION['cart.sum'] ?> &#x20bd;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <form class="row g-3" method="POST" action="cart/checkout">

                    <?php if (!isset($_SESSION['user'])) : ?>
                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="<?= get_field_value('email') ?>">
                                <label class="required" for="email"><?php et('cart_view_email_input'); ?></label>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="password" placeholder="password">
                                <label class="required" for="password"><?php et('cart_view_password_input'); ?></label>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?= get_field_value('name') ?>">
                                <label class="required" for="name"><?php et('cart_view_name_input'); ?></label>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?= get_field_value('address') ?>">
                                <label class="required" for="address"><?php et('cart_view_address_input'); ?></label>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="col-md-6 offset-md-3">
                        <div class="form-floating mb-3">
                            <textarea name="note" class="form-control" placeholder="Leave a comment here" id="note" style="height: 100px"><?= get_field_value('note') ?></textarea>
                            <label for="note"><?php et('cart_view_note_input'); ?></label>
                        </div>
                    </div>


                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-signup"><?php et('cart_view_order_btn') ?></button>
                    </div>

                </form>

                <?php
                if (isset($_SESSION['form_data'])) {
                    unset($_SESSION['form_data']);
                }
                ?>

            <?php else : ?>
                <h4 class="text-start"><?php et('tpl_cart_empty'); ?></h4>
            <?php endif; ?>

        </div>
    </div>
</div>