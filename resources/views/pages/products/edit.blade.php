@extends('layouts.main')

@section('content')
    <div class="container">
        <form class="form--default form--big" action="{{ route('products.update', ['product' => $product->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1>Edit product </h1>
            @include('components.inputs.Input', [
                'name' => 'cover',
                'placeholder' => 'cover',
                'type' => 'file',
            ])
            @include('components.inputs.Input', [
                'name' => 'name',
                'placeholder' => 'Name',
                'value' => $product->name,
            ])
            @include('components.inputs.Input', [
                'name' => 'price',
                'placeholder' => 'Price',
                'type' => 'number',
                'value' => $product->price,
            ])
            @include('components.inputs.Textarea', [
                'name' => 'description',
                'placeholder' => 'Description',
                'value' => $product->description,
            ])
            @include('components.inputs.Select', [
                'name' => 'product_category_id',
                'options' => $productCategories,
                'placeholder' => 'Product categories',
                'titleKey' => 'name',
                'valueKey' => 'id',
                'value' => $product->product_category_id,
            ])
            <button type="submit">Edit product</button>
        </form>
    </div>
@endsection
