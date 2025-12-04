<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $carts = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();
        return view('frontend.pages.cart', compact('carts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = Auth::user();

        $product = Product::find($request->product_id);

        if ($product->stock === 'Out of Stock') {
            return redirect()->back()->with('error', 'This product is out of stock!');
        }

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::where('user_id', Auth::id())
            ->where('id', $id)
            ->first();

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart item not found.');
        }

        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }



    public function destroy($id)
    {
        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Product removed from cart!');
        }

        return redirect()->back()->with('error', 'Product not found in your cart.');
    }
}
