@extends('layouts.main')

@section('content')
    <div class="container">
        <form class="form--default form--medium"
            action="{{ route('product-categories.update', ['product_category' => $productCategory->id]) }}" method="post">
            @csrf
            @method('PUT')
            <h1>Edit product category page</h1>
            @include('components.inputs.Input', [
                'name' => 'name',
                'placeholder' => 'Name',
                'value' => old('name') ?? $productCategory->name,
            ])
            <button type="submit">Edit product category</button>
        </form>
    </div>
@endsection
