<article class="product_card">
    <a href="{{ route('products.show', ['product' => $product->id]) }}">
        @if (isset($type) && $type == 'cart')
            <form action="{{ route('cart.destroy') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="product_card__button" type="submit">Delete</button>
            </form>
        @endif
        <img src="{{ asset('storage/images/products/' . $product->cover) }}" alt="{{ $product->name }}"
            class="product_card__cover">
    </a>
    <div class="product_card__content">
        <p class="product_card__title">{{ $product->name }}</p>
        <p class="product_card__price">{{ $product->price }}</p>
        @php
            $cartProduct = App\Models\CartProduct::where('user_id', auth()->user()->id)
                ->where('product_id', $product->id)
                ->first();
        @endphp
        <div class="product_card__buttons">
            @isset($cartProduct)
                <div class="product_count__buttons">
                    <form action="{{ route('cart.add') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="product_count__button" type="submit">+</button>
                    </form>
                    <p class="product_count__text">{{ $cartProduct->count }}</p>
                    <form action="{{ route('cart.remove') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="product_count__button" type="submit">-</button>
                    </form>
                </div>
            @else
                <form action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button class="product_card__button" type="submit">Add to cart</button>
                </form>
            @endisset
        </div>
    </div>
    @if (isset($type) && $type == 'cart')
    @else
        <div class="product_card__admin">
            @if (auth()->check() && auth()->user()->user_role_id == 3)
                <div class="product_card__admin_buttons">
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
    @endif
</article>
