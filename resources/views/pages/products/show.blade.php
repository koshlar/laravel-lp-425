@extends('layouts.main')

@section('content')
    <article class="product">
        <div class="container">
            <div class="product__container">
                <img src="{{ asset('storage/images/products/' . $product->cover) }}" alt="{{ $product->name }}"
                    class="product__cover">
                <div class="product__content">
                    <p class="product__title">{{ $product->name }}</p>
                    <p class="product__price">{{ $product->price }}</p>
                    <p class="product__description">
                        {{ $product->description }}
                    </p>
                    <form action="" method="post">
                        @csrf
                        <button class="product__button" type="submit">Add to cart</button>
                    </form>

                    @if (auth()->check() && auth()->user()->user_role_id == 3)
                        <div class="product__admin_buttons">
                            <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="button">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </article>
@endsection
