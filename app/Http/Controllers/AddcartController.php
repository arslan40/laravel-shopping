<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderItems;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AddcartController extends Controller
{

    public function getAddToCart(Request $request, $id)
    {
        // dd($request);
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);    // Set Session
        return redirect()->route('viewCart');
    }

    public function viewCart(Request $request)

    {
        if (!Session::has('cart')) {
            return view('addcart.addcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // dd($oldCart->items["3"]['qty']);
        // dd($cart->items);
        return view('addcart.addcart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function deleteCart($id)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        foreach ($cart->items as $_id => $product) {
            // $_id = $product['item']->id;
            if ($_id == $id) {
                unset($cart->items[$id]);
            }
        }
        Session::put('cart', $cart);
        Session::forget('cart');
        return redirect('view_cart');
    }
    public function AjaxCall(Request $request)
    {
        if (!Session::has('cart')) {
            return "";
        }
        $oldCart = Session::get('cart');
        $qty_array = $request->quantities_array;
        for ($i = 0; $i < count($qty_array); $i++) {
            $oldCart->items[(int)$request->product_ids_arrays[$i]]['qty'] = $qty_array[$i];
        }
        return json_encode($oldCart->items[3]['qty']);
    }

    public function checkout(Request $request)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('checkout.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function store(Request $request)
    {
        $cart = Session::get('cart');
        $order = new Order();
        // $order->save();
        // DB::table('orders')->insert($cart);
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone_number = $request->input('phone_number');
        $order->address = $request->input('address');
        $order->payment_method = $request->input('payment_method');
        $order->grand_total = $cart->totalPrice;
        $order->save();
        // dd($order);
        // dd($cart->items);

        foreach ($cart->items as $_id => $product) {
            // DB::table('order_items')->insert($cart);
            $orderitems = new OrderItems();
            $orderitems->orders_id = $order->id;
            $orderitems->products_id = $product["item"]->id;
            $orderitems->unit_price = $product["price"];
            $orderitems->Quantity = $product["qty"];
            $orderitems->product_total = $product["price"] * $product["qty"];
            $orderitems->save();
            // dd('$orderitems');
            return redirect('order_done');
        }
    }
    public function done()
    {
        $cart = Session::get('cart');
        $order = new Order();
        return view('orderDone.orderDone', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}
