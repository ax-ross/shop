<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background-color: #f9f9f9">
                <th style="padding: 8px; border: 1px solid #ddd;"><?php et('tpl_cart_product') ?></th>
                <th style="padding: 8px; border: 1px solid #ddd;"><?php et('tpl_cart_amount') ?></th>
                <th style="padding: 8px; border: 1px solid #ddd;"><?php et('tpl_cart_price') ?></th>
                <th style="padding: 8px; border: 1px solid #ddd;"><?php et('tpl_cart_sum') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $item) : ?>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['title'] ?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['amount'] ?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['price'] ?> &#x20bd;</td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['price'] * $item['amount'] ?> &#x20bd;</td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" style="padding: 8px; border: 1px solid #ddd;"><?php et('tpl_cart_total_amount') ?></td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $_SESSION['cart.amount'] ?></td>
            </tr>
            <tr>
                <td colspan="3" style="padding: 8px; border: 1px solid #ddd;"><?php et('tpl_cart_sum') ?></td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $_SESSION['cart.sum'] ?> &#x20bd;</td>
            </tr>
        </tbody>
    </table>

</body>

</html>