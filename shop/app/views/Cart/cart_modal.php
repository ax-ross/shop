<div class="modal-body">
    <?php if (!empty($_SESSION['cart'])) : ?>
        <div class="table-responsive cart-table">
            <table class="table text-start">
                <thead>
                <?php if (!empty($_SESSION['cart'])) : ?>
                    <div class=" text-end">
                    <button type="button" class="btn empty-trash"><?php et('tpl_cart_clear') ?></button>
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
                            <td><a href="cart/delete?id=<?= $id ?>" class="del-item"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-end"><?php et('tpl_cart_total_amount') ?></td>
                    <td class="cart-amount"><?= $_SESSION['cart.amount'] ?></td>
                </tr><tr>
                    <td colspan="4" class="text-end"><?php et('tpl_cart_sum') ?></td>
                    <td class="cart-sum"><?= $_SESSION['cart.sum'] ?> &#x20bd;</td>
                </tr>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <h4 class="text-start">Empty Cart</h4>
    <?php endif; ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn continue-shopping" data-bs-dismiss="modal"><?php et('tpl_cart_continue_shopping') ?></button>

    <?php if (!empty($_SESSION['cart'])) : ?>
        <button type="button" class="btn checkout"><?php et('tpl_cart_checkout') ?></button>
    <?php endif; ?>
</div>