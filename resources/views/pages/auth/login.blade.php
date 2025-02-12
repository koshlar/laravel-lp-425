@extends('layouts.main')

@section('content')
    <div class="container">
        <form class="form--default form--medium" action="{{ route('login') }}" method="post">
            @csrf
            <h1>Login</h1>
            @include('components.Input', [
                'name' => 'email',
                'placeholder' => 'Email',
                'type' => 'email',
                'value' => old('email'),
            ])
            @include('components.Input', [
                'name' => 'password',
                'placeholder' => 'Password',
                'type' => 'password',
            ])
            <button type="submit">Login</button>
        </form>
    </div>
@endsection
