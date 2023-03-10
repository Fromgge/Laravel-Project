<?php

namespace App\Services\Contracts;

use App\Models\Order;
use LaravelDaily\Invoices\Invoice;

interface InvoicesServiceContact
{
    public function generate(Order $order): Invoice;
}
