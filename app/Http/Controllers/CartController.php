<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;

class CartController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('cart.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
        return $cartItem->id == $request->id;
    });

    if ($duplicates->isNotEmpty()) {
        return redirect()->route('cart.index')
            ->with('success_message', "{$request->name} is already in your cart")
        ;            
    }

    Cart::add($request->id, $request->name, 1, $request->price)
        ->associate('App\Product');

    return redirect()->route('cart.index')
        ->with('success_message', "{$request->name} was added to your cart")
    ;
  }

  public function switchToSaveForLater($row_id)
  {
    $item = Cart::get($row_id);
    
    Cart::remove($row_id);

    Cart::instance('save-for-later')->add($item->id, $item->name, 1, $item->price)
        ->associate('App\Product');

    return redirect()->route('cart.index')
        ->with('success_message', "{$item->name} has been saved for later")
    ;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Cart::remove($id);

    return redirect()->route('cart.index')
        ->with('success_message', "The item was removed from your cart")
    ;
  }
}
