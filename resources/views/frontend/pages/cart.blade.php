@extends('layouts.frontend.app')
@section('content')
    <x-breadcrumb title="Cart" :links="[['name' => 'Home', 'url' => route('home')], ['name' => 'Cart', 'url' => '#']]" />

    <div class="liton__shoping-cart-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-inner">
                        @if ($carts->count())
                            <div class="currency-selector mb-2 text-end">
                                <label><input type="radio" name="currency" value="INR" checked>INR(₹)</label>
                                <label><input type="radio" name="currency" value="USD">USD($)</label>
                            </div>
                            <div class="shoping-cart-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <th class="cart-product-image">Image</th>
                                        <th class="cart-product-info">Product</th>
                                        <th class="cart-product-subtotal">Packs</th>
                                        <th class="cart-product-price">Price</th>
                                        <th class="cart-product-quantity">Quantity</th>
                                        <th class="cart-product-remove">Remove</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td class="cart-product-image">
                                                    <a
                                                        href="{{ route('product.details', $cart->productVariant->product->slug) }}"><img
                                                            src="{{ asset(Storage::url($cart->productVariant->product->image)) }}"
                                                            alt="{{ $cart->productVariant->product->name }}"></a>
                                                </td>
                                                <td class="cart-product-info">
                                                    <h4 class="m-0"><a
                                                            href="{{ route('product.details', $cart->productVariant->product->slug) }}">{{ $cart->productVariant->product->name }}</a>
                                                    </h4>
                                                </td>
                                                <td class="cart-product-subtotal">
                                                    {{ $cart->productVariant->pack }}
                                                </td>

                                                <td class="cart-product-price"><span
                                                        class="price inr">₹{{ $cart->productVariant->inr_price }}</span>
                                                    <span class="price usd" style="display:none;">
                                                        ${{ $cart->productVariant->usd_price }}</span>
                                                </td>


                                                <td class="cart-product-quantity">
                                                    <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="{{ $cart->quantity }}"
                                                                name="quantity" class="cart-plus-minus-box">
                                                        </div>
                                                        <button type="submit" class="d-none">
                                                            Update
                                                        </button>
                                                    </form>
                                                </td>

                                                <td class="cart-product-remove">
                                                    <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn">
                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="shoping-cart-total mt-30">
                                <div class="btn-wrapper text-end">
                                    <form action="{{ route('orders.store') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="theme-btn-1 btn btn-effect-1">
                                            Submit Enquiry
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="text-center">
                                <p class="text-center">No cart items. Please add products to the cart.</p>
                                <a href="{{ route('products') }}"
                                    class="theme-btn-1 btn btn-effect-1 text-uppercase">Products</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.cart-plus-minus-box').forEach(function(input) {
                let timeout;

                input.addEventListener('input', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        this.closest('form').submit();
                    }, 1000);
                });

                input.addEventListener('change', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        this.closest('form').submit();
                    }, 1000);
                });
            });

            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('qtybutton')) {
                    let input = e.target.parentElement.querySelector('.cart-plus-minus-box');
                    clearTimeout(input.timeout);
                    input.timeout = setTimeout(() => {
                        input.closest('form').submit();
                    }, 1000);
                }
            });
        });
    </script>

    <script>
        const currencyRadios = document.querySelectorAll('input[name="currency"]');
        const inrPrice = document.querySelector('.price.inr');
        const usdPrice = document.querySelector('.price.usd');

        currencyRadios.forEach(radio => {
            radio.addEventListener('change', () => {
                if (radio.value === 'INR') {
                    inrPrice.style.display = 'inline';
                    usdPrice.style.display = 'none';
                } else {
                    inrPrice.style.display = 'none';
                    usdPrice.style.display = 'inline';
                }
            });
        });
    </script>
@endsection
