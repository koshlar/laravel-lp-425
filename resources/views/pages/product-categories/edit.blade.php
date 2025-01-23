@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit product category page!</h1>
        <form action="{{ route('product-categories.update', ['product-category' => $productCategory->id]) }}" method="post">
            @csrf
            @method('PUT')
            @include('components.Input', [
                'name' => 'name',
                'placeholder' => 'Name',
                'value' => old('name') ?? $productCategory->name,
            ])
            <button type="submit">Edit product category</button>
        </form>
    </div>
@endsection
