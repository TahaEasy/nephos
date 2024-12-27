<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function add_order()
    {
        $cart = auth()->user()->cart;
        $cart_items = $cart->cart_items;

        if (!$cart || !$cart_items) {
            toast()->danger('شفارش شما ناموفق بود، لطفا دوباره تلاش کنید!', 'خطا!')->pushOnNextPage();
            return redirect('/');
        }

        $order = new Order();
        $order->user_id = $cart->user_id;
        $order->save();

        foreach ($cart_items as $cart_item) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->product_id = $cart_item->product_id;
            $order_item->quantity = $cart_item->quantity;
            $order_item->save();
            $cart_item->delete();
        }

        $invoice = new Invoice();
        $user = auth()->user();

        $invoice->order_id = $order->id;
        $invoice->f_name = $user->f_name;
        $invoice->l_name = $user->l_name;
        $invoice->email = $user->email;
        $invoice->phone = $user->phone;
        $invoice->province = $user->province;
        $invoice->city = $user->city;
        $invoice->street = $user->street;
        $invoice->alley = $user->alley;
        $invoice->plaque = $user->plaque;
        $invoice->post_code = $user->post_code;
        $invoice->save();

        toast()->success('سفارش شما با موفقیت انجام شد!', 'موفق!')->pushOnNextPage();
        return redirect(route('orders'));
    }

    public function show_order(Order $order)
    {
        return view('dashboard.order.order-page', compact('order'));
    }

    public function show_invoice(Order $order)
    {
        $invoice = $order->invoice;
        return view('dashboard.order.invoice', compact('order', 'invoice'));
    }
}
