<?php

namespace App\Http\Controllers;

use App\Mail\AdminOrderConfirmationMail;
use App\Mail\UserOrderConfirmationMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
            ->with('orderItems.productVariant')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('orders', compact('orders'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $cartItems = Cart::with('productVariant')
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Cart is empty!');
        }

        try {

            function generateUniqueOrderNumber()
            {
                do {
                    $orderNumber = '#ENQ' . date('Y') . '-' . mt_rand(10000, 99999);
                } while (Order::where('order_number', $orderNumber)->exists());

                return $orderNumber;
            }

            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => generateUniqueOrderNumber(),
            ]);


            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_variant_id' => $item->product_variant_id,
                    'quantity' => $item->quantity,
                ]);
            }

            Cart::where('user_id', $user->id)->delete();

            Mail::to($user->email)->send(new UserOrderConfirmationMail($order));

            Mail::to('indrareddy85128@gmail.com')->send(new AdminOrderConfirmationMail($order));

            return redirect()->route('orders.index')
                ->with('success', 'Enquiry submitted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to submit enquiry');
        }
    }

    public function show($id)
    {
        $order = Order::with('user', 'orderItems.productVariant')->findOrFail($id);

        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('order-details', compact('order'));
    }
}
