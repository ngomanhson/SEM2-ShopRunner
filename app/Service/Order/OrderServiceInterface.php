<?php

namespace App\Service\Order;

use App\Service\ServiceInterface;

interface OrderServiceInterface extends ServiceInterface
{
    public function getOrderByUserId($user_id);
    public function confirmOrderPayment($orderId);
}
