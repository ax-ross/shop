<?php


namespace app\models;

use RedBeanPHP\R;

class Order extends AppModel
{


    public static function saveOrder($data)
    {
        R::begin();
        try {
            $order = R::dispense('order');
            $order->user_id = $data['user_id'];
            $order->note = $data['note'];
            $order->total = $_SESSION['cart.sum'];
            $order->amount = $_SESSION['cart.amount'];
            $order_id = R::store($order);

            R::commit();
            return $order_id;
        } catch (\Exception $e) {
            R::rollback();
            return false;
        }
    }
}
