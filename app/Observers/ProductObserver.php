<?php

namespace App\Observers;

use App\Models\Product;
use App\Services\FileStorageService;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     *
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @return void
     */
    public function deleted(Product $product)
    {
        if ($product->images()->count() > 0) {
            $product->images->each->delete();
        }

        FileStorageService::remove($product->thumbnail);
    }

    /**
     * Handle the Product "restored" event.
     *
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
