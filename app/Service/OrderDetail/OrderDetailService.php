<?php

namespace App\Service\OrderDetail;

use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Service\BaseService;

class OrderDetailService extends BaseService implements OrderDetailServiceInterface
{
    public $repository;
    public function __construct(OrderDetailRepositoryInterface $orderDetailRepository)
    {
       $this->repository = $orderDetailRepository;
    }
}
