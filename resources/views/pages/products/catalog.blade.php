@extends('layouts.main')

@section('content')
    <div class="catalog">
        <div class="container">
            <h1>Catalog</h1>
            <div class="products__wrapper catalog__wrapper">
                <article class="product_card">
                    <img src="https://moncler-cdn.thron.com/delivery/public/image/moncler/K10911A00091549MFU42_R/dpx6uv/std/1024x1536/monges-down-shirt-jacket-men-dark-blue-moncler.jpg?scalemode=centered&adjustcrop=reduce&quality=80&format=avif"
                        alt="image" class="product_card__cover">
                    <div class="product_card__content">
                        <p class="product_card__title"></p>
                        <p class="product_card__price"></p>
                        <form action="" method="post">
                            @csrf
                            <button class="product_card__button" type="submit">Add to cart</button>
                        </form>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
