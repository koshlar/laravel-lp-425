@extends('layouts.main')

@section('content')
    <div class="catalog">
        <div class="container">
            <div class="catalog__title">
                <h1>Product categories</h1>
                <a href="{{ route('product-categories.create') }}" class="button">
                    Add product category
                </a>
            </div>
            <div class="products__wrapper catalog__wrapper">
                @foreach ($productCategories as $item)
                    <article class="product_card">
                        <p class="product_card__title">{{ $item->name }}</p>
                        <div class="product_card__admin_buttons">
                            <a href="{{ route('product-categories.edit', ['product_category' => $item->id]) }}"
                                class="button">
                                Edit
                            </a>
                            <form action="{{ route('product-categories.destroy', ['product_category' => $item->id]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection
