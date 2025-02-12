@extends('layouts.main')

@section('content')
    <div class="catalog">
        <div class="container">
            <div class="catalog__title">
                <h1>Cart</h1>
            </div>
            @if (isset($products) && count($products) > 0)
                <div class="products__wrapper catalog__wrapper">
                    @foreach ($products as $product)
                        @include('components.ProductCard', [
                            'product' => $product->product,
                            'type' => 'cart',
                        ])
                    @endforeach
                </div>
            @else
                <p>No products here</p>
            @endif
        </div>
    </div>
@endsection
