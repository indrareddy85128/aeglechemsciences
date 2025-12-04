@extends('layouts.frontend.app')
@section('content')
    <x-breadcrumb title="Products" :links="[['name' => 'Home', 'url' => route('home')], ['name' => 'Products', 'url' => '#']]" />


    <div class="ltn__product-area ltn__product-gutter pt-50 pb-50">
        <div class="container-fluid">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-2 col-md-3 col-6">
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
@endsection
