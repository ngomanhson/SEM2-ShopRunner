<?php

namespace App\Service\Order;
use App\Models\Order;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Service\BaseService;

class OrderService extends BaseService implements OrderServiceInterface
{
    public $repository;
    public function __construct(OrderRepositoryInterface $OrderRepository)
    {
       $this->repository = $OrderRepository;
    }

    public function getOrderByUserId($user_id)
    {
        // TODO: Implement getOrderByUserId() method.
        return $this->repository->getOrderByUserId($user_id);
    }
    public function confirmOrderPayment($orderId)
    {
        // Tìm đơn hàng dựa trên ID
        $order = Order::find($orderId);

        if ($order) {
            // Cập nhật trạng thái thành 1
            $order->status = 1;
            $order->save();
        } else {
            // Xử lý trường hợp không tìm thấy đơn hàng
            throw new \Exception('Order not found');
        }
    }
}
