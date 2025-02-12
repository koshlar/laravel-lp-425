@extends('layouts.main')

@section('content')
    <div class="container">
        <form class="form--default form--big" action="{{ route('product-categories.store') }}" method="post">
            @csrf
            <h1>Create product category</h1>
            @include('components.Input', [
                'name' => 'name',
                'placeholder' => 'Name',
            ])
            <button type="submit">Create product category</button>
        </form>
    </div>
@endsection
