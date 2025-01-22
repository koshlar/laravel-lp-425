@extends('layouts.main')

@section('content')
    <article class="product">
        <div class="container">
            <div class="product__content">
                <img {{ asset('storage/images/products/' . $product->cover) }}" alt="{{ $product->name }}"
                    class="product__cover">
                <div class="product__content">
                    <p class="product__title">{{ $product->name }}</p>
                    <p class="product__price">{{ $product->price }}</p>
                    <form action="" method="post">
                        @csrf
                        <button class="product__button" type="submit">Add to cart</button>
                    </form>
                </div>
            </div>
            <div class="product__info">
                <p class="product__description">
                    {{ $product->description }}
                </p>
            </div>
        </div>
    </article>
@endsection
