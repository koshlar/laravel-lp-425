@extends('layouts.main')

@section('content')
    <div class="catalog">
        <div class="container">
            <h1>Catalog</h1>
            <div class="products__wrapper catalog__wrapper">
                @foreach ($products as $item)
                    <article class="product_card">
                        <a href="{{ route('products.show', ['product' => $item->id]) }}">
                            <img src="{{ asset('storage/images/products/' . $item->cover) }}" alt="{{ $item->name }}"
                                class="product_card__cover">
                        </a>
                        <div class="product_card__content">
                            <p class="product_card__title">{{ $item->name }}</p>
                            <p class="product_card__price">{{ $item->price }}</p>
                            <form action="" method="post">
                                @csrf
                                <button class="product_card__button" type="submit">Add to cart</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection
