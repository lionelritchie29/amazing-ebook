<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add(Request $request) {
        $user = $request->session()->get('user');
        $ebook_id = $request->ebook_id;

        $order = Order::where([
            ['account_id', '=', $user->account_id],
            ['ebook_id', '=', $ebook_id],
        ])->first();

        if ($order != null)
        return redirect()->back()->with('error', 'This book is already in your cart');

        Order::create([
            'account_id' => $user->account_id,
            'ebook_id' => $ebook_id,
            'order_date' => date("Y-m-d"),
        ]);

        return redirect()->back()->with('success', 'Order added succesfully');
    }

    public function get(Request $request) {
        $user = $request->session()->get('user');
        $orders = Order::where('account_id', $user->account_id)->get();
        return view('cart', ['orders' => $orders]);
    }

    public function delete(Request $request) {
        $account_id = $request->session()->get('user')->account_id;
        $ebook_id = $request->ebook_id;

        Order::where([
            ['account_id', '=', $account_id],
            ['ebook_id', '=', $ebook_id],
        ])->delete();

        return redirect()->back()->with('success', 'Order deleted succesfully');
    }
}
