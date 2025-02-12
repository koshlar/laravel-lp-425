@extends('layouts.main')

@section('content')
    <div class="catalog">
        <div class="container">
            <div class="catalog__title">
                <div class="catalog__headline_buttons">
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
                <select class="catalog__select" id="product_category_id">
                    @foreach ($productCategories as $category)
                        <option @selected(isset($_GET['pci']) && $_GET['pci'] == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    <script>
                        const select = document.querySelector('#product_category_id')
                        select.onchange = () => {
                            const url = new URL(document.location.href);
                            url.searchParams.set('pci', select.value);
                            document.location.href = url.toString();
                        }
                    </script>
                </select>
            </div>
            @if (isset($products) && count($products) > 0)
                <div class="products__wrapper catalog__wrapper">
                    @foreach ($products as $product)
                        @include('components.ProductCard', ['product' => $product])
                    @endforeach
                </div>
            @else
                <p>No products here</p>
            @endif
        </div>
    </div>
@endsection
