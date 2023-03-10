<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Facades\Invoice as InvoiceBuilder;

class InvoicesService implements Contracts\InvoicesServiceContract
{

    public function generate(Order $order): Invoice
    {
//        $user = $order->user;

        $customer = new Buyer([
            'name' => $order->fullName,
            'custom_fields' => [
                'email' => $order->email,
                'phone' => $order->phone,
                'city' => $order->city,
                'address' => $order->address
            ],
        ]);

        $invoice = InvoiceBuilder::make()
            ->series('BIG')
            ->serialNumberFormat($order->vendor_order_id)
            // ability to include translated invoice status
            // in case it was paid
            ->status($order->status->name)
            ->buyer($customer)
            ->taxRate(config('cart.tax'))
            ->filename($order->vendor_order_id)
            ->addItems($this->getInvoiceItems($order->products))
            ->save('public');

        if ($order->in_process){
            $invoice->payUntilDays(5);
        }

        return $invoice;
    }

    public function getInvoiceItems(Collection $products): array
    {
        $items = [];

        foreach($products as $product) {
            $items[] = (new InvoiceItem())
                ->title($product->title)
                ->pricePerUnit($product->pivot->single_price)
                ->quantity($product->pivot->quantity)
                ->units('од.');

        }
        return $items;
    }
}
