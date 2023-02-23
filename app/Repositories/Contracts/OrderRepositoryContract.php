<?php

namespace App\Repositories\Contracts;

use App\Helpers\TransactionAdapter;
use App\Models\Order;

interface OrderRepositoryContract
{
    public function create(array $request): Order|bool;

    public function setTransaction(string $vendorOrderId, TransactionAdapter $adapter): Order;
}
