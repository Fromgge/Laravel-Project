<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishListController extends Controller
{
    public function add(Product $product)
    {
        auth()->user()->addToWish($product);
        Cart::instance('wishlist')->add($product->id, $product->title, 1, $product->endPrice)->associate($product);

        notify()->success('Product was added to wish list', position: 'topRight');

        return redirect()->back();
    }

    public function remove(Product $product)
    {
        if ($cartItem = Cart::instance('wishlist')->content()->where('id', $product->id)?->first()) {
            auth()->user()->removeFromWish($product);
            Cart::instance('wishlist')->remove($cartItem->rowId);
            notify()->success('Product was removed to wish list', position: 'topRight');
        } else {
            notify()->error('Oops, smth went wrong', position: 'topRight');
        }

        return redirect()->back();
    }
}
