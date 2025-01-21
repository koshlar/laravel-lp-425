@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Create product page!</h1>
        <form action="{{ route('products.store') }}" method="post">
            @csrf
            @include('components.Input', [
                'name' => 'cover',
                'placeholder' => 'cover',
                'type' => 'file',
            ])
            @include('components.Input', [
                'name' => 'name',
                'placeholder' => 'Name',
                'value' => old('name'),
            ])
            @include('components.Input', [
                'name' => 'price',
                'placeholder' => 'Price',
                'type' => 'number',
                'value' => old('price'),
            ])
            @include('components.Input', [
                'name' => 'description',
                'placeholder' => 'Description',
                'value' => old('description'),
            ])
            <button type="submit">Create product</button>
        </form>
    </div>
@endsection
