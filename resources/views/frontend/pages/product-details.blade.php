@extends('layouts.frontend.app')
@section('content')
    <x-breadcrumb title="{{ $product->name }}" :links="[
        ['name' => 'Home', 'url' => route('home')],
        ['name' => 'Products', 'url' => route('products')],
        ['name' => $product->name, 'url' => '#'],
    ]" />


    <div class="ltn__shop-details-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner mb-60">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            <img src="{{ asset(Storage::url($product->image)) }}" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">

                                    <div class="currency-selector mb-2">
                                        <label><input type="radio" name="currency" value="INR" checked>INR(₹)</label>
                                        <label><input type="radio" name="currency" value="USD">USD($)</label>
                                    </div>

                                    <div class="product-category-badge">
                                        <span class="badge">{{ $product->category->name }}</span>
                                    </div>

                                    <h3>{{ $product->name }}</h3>

                                    <div class="product-price">
                                        <span class="price inr">₹{{ $product->inr_price }}</span>
                                        <span class="price usd" style="display:none;">${{ $product->usd_price }}</span>
                                    </div>

                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge"
                                                style="background-color: {{ $product->stock == 'In Stock' ? 'green' : 'red' }};">
                                                {{ $product->stock }}</li>
                                        </ul>
                                    </div>

                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                        <ul>
                                            <li><strong>Quantity</strong> <span> {{ $product->quantity }}</span></li>
                                            <li><strong>Catalogue Number</strong>
                                                <span>{{ $product->catalogue_number }}</span>
                                            </li>
                                            <li><strong>CAS Number</strong> <span>{{ $product->cas_number }}</span></li>
                                            <li><strong>HSN Code</strong> <span>{{ $product->hsn_code }}</span></li>
                                            <li><strong>Molecular Formula</strong>
                                                <span>{{ $product->molecular_formula }}</span>
                                            </li>
                                            <li><strong>Molecular Weight</strong>
                                                <span>{{ $product->molecular_weight }}</span>
                                            </li>
                                            <li><strong>Purity</strong> <span>{{ $product->purity }}</span></li>
                                            <li><strong>Density</strong> <span>{{ $product->density }}</span></li>
                                        </ul>
                                    </div>

                                    <div class="ltn__product-details-menu-2">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <ul>
                                                <li>
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="1" name="quantity"
                                                            class="cart-plus-minus-box">
                                                    </div>
                                                </li>
                                                <li>
                                                    <button type="submit" class="theme-btn-1 btn btn-effect-1">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        <span>ADD TO CART</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <div class="widget ltn__top-rated-product-widget">
                            <ul>
                                @foreach ($relatedProducts as $item)
                                    <li>
                                        <div class="top-rated-product-item clearfix">
                                            <div class="top-rated-product-img">
                                                <a href="{{ route('product.details', $item->slug) }}">
                                                    <img src="{{ asset(Storage::url($item->image)) }}"
                                                        alt="{{ $item->name }}">
                                                </a>
                                            </div>
                                            <div class="top-rated-product-info">
                                                <h6>
                                                    <a href="{{ route('product.details', $item->slug) }}">
                                                        {{ $item->name }}
                                                    </a>
                                                </h6>
                                                <div class="product-price">
                                                    <span>₹{{ $item->inr_price }}</span>
                                                </div>
                                                <h5>{{ $item->hsn_code }}</h5>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                </div>
            </div>
        </div>
    </div>

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
