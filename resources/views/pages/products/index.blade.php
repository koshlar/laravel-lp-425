@extends('layouts.main')

@section('content')
    <div class="catalog">
        <div class="container">
            <div class="catalog__title">
                <h1>Catalog</h1>
                @if (auth()->check() && auth()->user()->user_role_id == 3)
                    <a href="{{ route('products.create') }}" class="button">
                        Add product
                    </a>
                    <a href="{{ route('product-categories.create') }}" class="button">
                        Add product category
                    </a>
                @endif
            </div>
            <div class="products__wrapper catalog__wrapper">
                @foreach ($products as $product)
                    @include('components.ProductCard', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
@endsection
