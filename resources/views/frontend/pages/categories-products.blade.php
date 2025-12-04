@extends('layouts.frontend.app')
@section('content')
    <x-breadcrumb title="{{ $category->name }}" :links="[
        ['name' => 'Home', 'url' => route('home')],
        ['name' => 'Products', 'url' => route('products')],
        ['name' => $category->name, 'url' => '#'],
    ]" />



    <div class="ltn__product-area ltn__product-gutter mt-50 mb-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <div class="widget ltn__menu-widget">
                            <ul>
                                @foreach ($categories as $cat)
                                    <li class="{{ $cat->id == $category->id ? 'tab-active' : '' }}"><a
                                            href="{{ route('products.category', $cat->slug) }}">{{ $cat->name }}<span><i
                                                    class="fas fa-long-arrow-alt-right"></i></span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9">
                    <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="{{ route('product.details', $product->slug) }}"><img
                                                    src="{{ asset(Storage::url($product->image)) }}"
                                                    alt="{{ $product->name }}"></a>
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
                                        <ul class="product-list">
                                            <li>{{ $product->cas_number }}</li>
                                            <li>{{ $product->hsn_code }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
