@extends('layouts.frontend.app')
@section('content')
    <x-breadcrumb title="{{ $product->name }}" :links="[
        ['name' => 'Home', 'url' => route('home')],
        ['name' => 'Products', 'url' => route('products')],
        ['name' => $product->name, 'url' => '#'],
    ]" />


    <div class="ltn__shop-details-area pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="ltn__shop-details-inner mb-50">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            <img src="{{ asset(Storage::url($product->image)) }}" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <div class="product-category-badge">
                                        <span class="badge">{{ $product->category->name }}</span>
                                    </div>

                                    <h3>{{ $product->name }}</h3>

                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge"
                                                style="background-color: {{ $product->stock == 'In Stock' ? 'green' : 'red' }};">
                                                {{ $product->stock }}</li>
                                        </ul>
                                    </div>

                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                        <ul>
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

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <div class="currency-selector mb-2 text-end">
                            <label><input type="radio" name="currency" value="INR" checked>INR(₹)</label>
                            <label><input type="radio" name="currency" value="USD">USD($)</label>
                        </div>
                        <div class="widget ltn__top-rated-product-widget">
                            <div class="table-responsive">
                                <table class="table tablie-customize">
                                    <thead>
                                        <tr>
                                            <th scope="col"><strong>Packs</strong></th>
                                            <th scope="col"><strong>Availability</strong></th>
                                            <th scope="col"><strong>Price</strong></th>
                                            <th scope="col"><strong>Qty (No)</strong></th>
                                            <th scope="col"><strong>Cart</strong></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($product->productVariants as $variant)
                                            <tr>
                                                <th>{{ $variant->pack }}</th>
                                                <td>{{ $variant->availability }}</td>
                                                <td>
                                                    <div class="product-price">
                                                        <span class="price inr fw-bold">₹{{ $variant->inr_price }}</span>
                                                        <span
                                                            class="price usd fw-bold d-none">${{ $variant->usd_price }}</span>
                                                    </div>
                                                </td>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <td>
                                                        <div class="cart-plus-minus quantity-customize">
                                                            <input type="text" value="1" name="quantity"
                                                                class="cart-plus-minus-box">
                                                        </div>
                                                    </td>
                                                    <input type="hidden" name="product_variant_id"
                                                        value="{{ $variant->id }}">
                                                    <td>
                                                        <button type="submit"
                                                            class="theme-btn-1 btn btn-effect-1 px-2 py-1">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </button>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__product-slider-area ltn__product-gutter pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2">
                        <h1 class="section-title">Related Products</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__related-product-slider-one-active slick-arrow-1">
                @foreach ($relatedProducts as $product)
                    <div class="col-lg-12">
                        <div class="ltn__product-item ltn__product-item-3 text-center">
                            <div class="product-img">
                                <a href="{{ route('product.details', $product->slug) }}"><img
                                        src="{{ asset(Storage::url($product->image)) }}" alt="{{ $product->name }}"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge"
                                            style="background-color: {{ $product->stock == 'In Stock' ? 'green' : 'red' }};">
                                            {{ $product->stock }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <h2 class="product-title"><a
                                        href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll("input[name='currency']").forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === "USD") {
                    document.querySelectorAll('.price.inr').forEach(e => e.classList.add('d-none'));
                    document.querySelectorAll('.price.usd').forEach(e => e.classList.remove('d-none'));
                } else {
                    document.querySelectorAll('.price.usd').forEach(e => e.classList.add('d-none'));
                    document.querySelectorAll('.price.inr').forEach(e => e.classList.remove('d-none'));
                }
            });
        });
    </script>
@endsection
