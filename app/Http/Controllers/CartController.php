<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $carts = Cart::with('productVariant')
            ->where('user_id', $user->id)
            ->get();
        return view('frontend.pages.cart', compact('carts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = Auth::user();

        $productVariant = ProductVariant::findOrFail($request->product_variant_id);

        if ($productVariant->product->stock === 'Out of Stock') {
            return redirect()->back()->with('error', 'This product is out of stock!');
        }

        if ($productVariant->availability < 1) {
            return redirect()->back()->with('error', 'This product pack is out of Availability!');
        }

        if ($request->quantity > $productVariant->availability) {
            return redirect()->back()->with('error', 'Requested quantity exceeds Availability!');
        }

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_variant_id', $request->product_variant_id)
            ->first();


        if ($cartItem) {

            $newQty = $cartItem->quantity + $request->quantity;

            if ($newQty > $productVariant->availability) {
                return redirect()->back()->with(
                    'error',
                    'You cannot add more than the Availability!'
                );
            }

            $cartItem->quantity = $newQty;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_variant_id' => $request->product_variant_id,
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

        $productVariant = $cart->productVariant;

        if (!$productVariant) {
            return redirect()->back()->with('error', 'Product variant not found.');
        }

        if ($request->quantity > $productVariant->availability) {
            return redirect()->back()->with(
                'error',
                'Requested quantity exceeds Availability!'
            );
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
