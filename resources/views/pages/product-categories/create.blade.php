@extends('layouts.main')

@section('content')
    <div class="container">
        <form class="form--default form--medium" action="{{ route('product-categories.store') }}" method="post">
            @csrf
            <h1>Create product category</h1>
            @include('components.inputs.Input', [
                'name' => 'name',
                'placeholder' => 'Name',
            ])
            <button type="submit">Create product category</button>
        </form>
    </div>
@endsection
