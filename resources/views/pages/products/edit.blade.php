@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit product page!</h1>
        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('components.Input', [
                'name' => 'cover',
                'placeholder' => 'cover',
                'type' => 'file',
            ])
            @include('components.Input', [
                'name' => 'name',
                'placeholder' => 'Name',
                'value' => old('name') ?? $product->name,
            ])
            @include('components.Input', [
                'name' => 'price',
                'placeholder' => 'Price',
                'type' => 'number',
                'value' => old('price') ?? $product->price,
            ])
            @include('components.Input', [
                'name' => 'description',
                'placeholder' => 'Description',
                'value' => old('description') ?? $product->description,
            ])
            <button type="submit">Edit product</button>
        </form>
    </div>
@endsection
