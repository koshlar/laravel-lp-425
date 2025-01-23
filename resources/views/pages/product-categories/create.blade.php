@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Create product category page!</h1>
        <form action="{{ route('product-categories.store') }}" method="post">
            @csrf
            @include('components.Input', [
                'name' => 'name',
                'placeholder' => 'Name',
            ])
            <button type="submit">Create product category</button>
        </form>
    </div>
@endsection
