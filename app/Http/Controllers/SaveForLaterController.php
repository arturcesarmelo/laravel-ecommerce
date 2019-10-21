<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{

  public function destroy($row_id)
  {
    Cart::instance('save-for-later')->remove($row_id);

    return redirect()->route('cart.index')
        ->with('success_message', "Product was removed from your saved products")
    ;
  }

  public function switchToCart($row_id)
  {
    $item = Cart::instance('save-for-later')->get($row_id);
    
    Cart::instance('save-for-later')->remove($item->rowId);

    Cart::instance('default')->add($item->model->id, $item->model->name, 1, $item->model->price)
        ->associate('App\Product');

    return redirect()->route('cart.index')
        ->with('success_message', "{$item->name} has been restored to your cart");

  }
}
