@extends('layouts.main')

@section('content')
    <div class="container">
        <form class="form--default form--big" action="{{ route('products.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <h1>Create product</h1>
            @include('components.inputs.Input', [
                'name' => 'cover',
                'placeholder' => 'cover',
                'type' => 'file',
            ])
            @include('components.inputs.Input', [
                'name' => 'name',
                'placeholder' => 'Name',
            ])
            @include('components.inputs.Input', [
                'name' => 'price',
                'placeholder' => 'Price',
                'type' => 'number',
            ])
            @include('components.inputs.Textarea', [
                'name' => 'description',
                'placeholder' => 'Description',
            ])
            @component('components.inputs.Select', [
                'name' => 'product_category_id',
                'placeholder' => 'Product category',
                'titleKey' => 'name',
                'valueKey' => 'id',
                'options' => $productCategories,
            ])
            @endcomponent
            <button type="submit">Create product</button>
        </form>
    </div>
@endsection
